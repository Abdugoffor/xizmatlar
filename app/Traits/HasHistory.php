<?php

namespace App\Traits;

use App\Models\History;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait HasHistory
{

    public static function bootHasHistory()
    {

        static::created(function (Model $model) {

            $model->storeHistory(
                'created',
                null,
                $model->sanitizeData($model->getAttributes())
            );

        });



        static::updated(function (Model $model) {

            $changes = $model->getChanges();

            unset($changes['updated_at']);

            if (empty($changes)) {
                return;
            }

            $original = array_intersect_key(
                $model->getOriginal(),
                $changes
            );

            $oldData = [];
            $newData = [];

            foreach ($changes as $field => $newValue) {

                $oldValue = $original[$field] ?? null;

                [$oldDiff, $newDiff] = $model->getJsonDiff($oldValue, $newValue);

                if ($oldDiff !== null || $newDiff !== null) {

                    $oldData[$field] = $oldDiff;
                    $newData[$field] = $newDiff;

                }
            }

            if (!empty($oldData) || !empty($newData)) {

                $model->storeHistory(
                    'updated',
                    $oldData,
                    $newData
                );

            }

        });



        static::deleted(function (Model $model) {

            $model->storeHistory(
                'deleted',
                $model->sanitizeData($model->getOriginal()),
                null
            );

        });



        if (in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive(static::class))) {

            static::restored(function (Model $model) {

                $model->storeHistory(
                    'restored',
                    null,
                    $model->sanitizeData($model->getAttributes())
                );

            });

        }

    }



    protected function storeHistory(string $action, $oldData = null, $newData = null): void
    {

        $modelType = get_class($this);
        $modelId = $this->getKey();
        $languageCode = null;



        if (method_exists($this, 'parent')) {

            try {

                $parentRelation = $this->parent();

                $parentClass = get_class($parentRelation->getModel());

                $foreignKey = $parentRelation->getForeignKeyName();

                $parentId = $this->{$foreignKey} ?? null;

                if ($parentId) {

                    $modelType = $parentClass;
                    $modelId = $parentId;
                    $languageCode = $this->language_code ?? null;

                }

            } catch (\Throwable $e) {

            }

        }



        History::create([

            'model_type' => $modelType,
            'model_id' => $modelId,
            'language_code' => $languageCode,
            'user_id' => Auth::id(),
            'action' => $action,
            'old_data' => $oldData ? $this->sanitizeData($oldData) : null,
            'new_data' => $newData ? $this->sanitizeData($newData) : null,

        ]);

    }



    protected function sanitizeData($data)
    {

        if (!is_array($data)) {
            return $data;
        }

        foreach ($data as $key => $value) {

            if (is_string($value)) {

                $decoded = json_decode($value, true);

                if (json_last_error() === JSON_ERROR_NONE) {
                    $data[$key] = $decoded;
                }

            }

        }

        return $data;

    }



    protected function getJsonDiff($oldValue, $newValue)
    {

        $oldArray = is_string($oldValue)
            ? json_decode($oldValue, true)
            : $oldValue;

        $newArray = is_string($newValue)
            ? json_decode($newValue, true)
            : $newValue;



        if (!is_array($oldArray) || !is_array($newArray)) {

            if ($oldValue !== $newValue) {
                return [$oldValue, $newValue];
            }

            return [null, null];

        }



        $oldDiff = [];
        $newDiff = [];



        foreach ($newArray as $key => $value) {

            $oldVal = $oldArray[$key] ?? null;

            if ($oldVal !== $value) {

                $oldDiff[$key] = $oldVal;
                $newDiff[$key] = $value;

            }

        }



        if (empty($oldDiff) && empty($newDiff)) {
            return [null, null];
        }



        return [$oldDiff, $newDiff];

    }



    public function histories()
    {

        return History::where('model_type', get_class($this))
            ->where('model_id', $this->getKey())
            ->orderByDesc('id');

    }



    public function getCreatorFromHistory()
    {

        $history = $this->histories()
            ->where('action', 'created')
            ->with('user')
            ->first();

        return $history ? $history->user : null;

    }



    public function getLastUpdaterFromHistory()
    {

        $history = $this->histories()
            ->where('action', 'updated')
            ->with('user')
            ->first();

        return $history ? $history->user : null;

    }

}