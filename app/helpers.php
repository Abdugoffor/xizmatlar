<?php

use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

if (!function_exists('slug')) {
    function slug(string $data)
    {
        $cyrillicAlphabet = [
            'а',
            'б',
            'в',
            'г',
            'д',
            'е',
            'ё',
            'ж',
            'з',
            'и',
            'й',
            'к',
            'л',
            'м',
            'н',
            'о',
            'п',
            'р',
            'с',
            'т',
            'у',
            'ф',
            'х',
            'ц',
            'ч',
            'ш',
            'щ',
            'ъ',
            'ы',
            'ь',
            'э',
            'ю',
            'я',
            'А',
            'Б',
            'В',
            'Г',
            'Д',
            'Е',
            'Ё',
            'Ж',
            'З',
            'И',
            'Й',
            'К',
            'Л',
            'М',
            'Н',
            'О',
            'П',
            'Р',
            'С',
            'Т',
            'У',
            'Ф',
            'Х',
            'Ц',
            'Ч',
            'Ш',
            'Щ',
            'Ъ',
            'Ы',
            'Ь',
            'Э',
            'Ю',
            'Я'
        ];
        $latinAlphabet = [
            'a',
            'b',
            'v',
            'g',
            'd',
            'e',
            'yo',
            'j',
            'z',
            'i',
            'y',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'r',
            's',
            't',
            'u',
            'f',
            'h',
            'ts',
            'ch',
            'sh',
            'sch',
            '',
            'y',
            '',
            'e',
            'yu',
            'ya',
            'a',
            'b',
            'v',
            'g',
            'd',
            'e',
            'yo',
            'j',
            'z',
            'i',
            'y',
            'k',
            'l',
            'm',
            'n',
            'o',
            'p',
            'r',
            's',
            't',
            'u',
            'f',
            'h',
            'ts',
            'ch',
            'sh',
            'sch',
            '',
            'y',
            '',
            'e',
            'yu',
            'ya'
        ];

        $str = str_replace($cyrillicAlphabet, $latinAlphabet, trim($data));
        $str = strtolower($str); // Translitsiyadan keyin kichiklashtirish
        $str = preg_replace('/[^\w\d\-\ ]/', '', $str); // Maxsus belgilarni olib tashlash
        $str = str_replace(' ', '-', $str); // Bo‘sh joylarni `-` bilan almashtirish
        return preg_replace('/\-{2,}/', '-', $str); // Ikki va undan ortiq `-` ni bitta `-` ga tushirish
    }
}


if (!function_exists('getLanguage')) {
    function getLanguage()
    {
        return Cache::remember("getLanguage", now()->addMinutes(180), function () {
            return Language::where('is_active', true)->get();
        });
    }
}

if (!function_exists('historyCheck')) {
    function historyCheck(...$models)
    {
        $allHistories = [];
        $modalId = null;

        // Collect histories from all models
        foreach ($models as $model) {
            if ($model) {
                // Handle single model (hasOne relationships)
                if ($model instanceof \Illuminate\Database\Eloquent\Model && $model->histories()->count()) {
                    // Use the first valid model's ID for the modal ID
                    if ($modalId === null) {
                        $modalId = $model->id;
                    }
                    // Store histories with model name for grouping
                    $modelName = class_basename($model);
                    $allHistories[] = [
                        'modelName' => $modelName,
                        'histories' => $model->histories,
                    ];
                }
                // Handle collection (hasMany relationships, like participantDetails)
                elseif ($model instanceof \Illuminate\Database\Eloquent\Collection) {
                    foreach ($model as $item) {
                        if ($item->histories()->count()) {
                            // Use the first valid model's ID for the modal ID if not set
                            if ($modalId === null) {
                                $modalId = $item->id;
                            }
                            // Store histories with model name for grouping
                            $modelName = class_basename($item);
                            $allHistories[] = [
                                'modelName' => $modelName,
                                'histories' => $item->histories,
                            ];
                        }
                    }
                }
            }
        }

        // If no histories, return empty string
        if (empty($allHistories)) {
            return '';
        }

        // Generate HTML for single button and modal
        $html = '<!-- Button trigger modal -->
        <a href="#" class="btn btn-outline-warning ml-1"
            data-toggle="modal" data-target="#panel_right' . $modalId . '">
            <i class="icon-history"></i>
        </a>
        <!-- Right panel -->
        <div id="panel_right' . $modalId . '" class="modal modal-right fade" tabindex="-1">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-transparent border-0 align-items-center">
                        <h5 class="modal-title font-weight-semibold">' . getTranslation('history') . '</h5>
                        <button type="button" class="btn btn-icon btn-light btn-sm border-0 rounded-pill ml-auto"
                            data-dismiss="modal"><i class="icon-cross2"></i></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="card card-body border-top-teal">
                            <div class="list-feed">';

        // Loop through each model's histories
        foreach ($allHistories as $modelData) {
            $modelName = $modelData['modelName'];
            $histories = $modelData['histories'];

            // Add a header for the model
            $html .= '<h6 class="mt-3">' . getTranslation('history_for') . ' ' . $modelName . '</h6>';

            foreach ($histories as $history) {
                $userName = optional($history->user)->name ?: 'System';
                $userEmail = optional($history->user)->email ? ' , ' . optional($history->user)->email : '';
                $createdAt = $history->created_at->format('d-M-Y, H:i');
                $actionTranslation = $history->action == 'create' ? getTranslation('created') : ($history->action == 'delete' ? getTranslation('deleted') : getTranslation($history->action));

                $html .= '<div class="list-feed-item">
                        <a href="#" class="text-default font-weight-semibold">' . $userName . $userEmail . '</a><br>
                        <span class="text-muted">' . $actionTranslation . ', ' . $createdAt . '</span>
                        <ul class="list-unstyled mt-2">';

                $changes = $history->changes ?? [];
                if (is_array($changes) && !empty($changes)) {
                    foreach ($changes as $key => $value) {
                        $formattedKey = ucfirst(str_replace('_', ' ', $key));

                        $oldValue = isset($value['old']) ? $value['old'] : null;
                        $newValue = isset($value['new']) ? $value['new'] : null;

                        if (is_array($oldValue) || is_array($newValue)) {
                            $html .= '<li><strong>' . $formattedKey . ':</strong><ul class="list-unstyled ml-3">';

                            $languages = ['uz', 'ru', 'en'];
                            foreach ($languages as $lang) {
                                $oldLangValue = is_array($oldValue) && isset($oldValue[$lang]) ? $oldValue[$lang] : getTranslation('no-data');
                                $newLangValue = is_array($newValue) && isset($newValue[$lang]) ? $newValue[$lang] : getTranslation('no-data');

                                if ($oldLangValue !== $newLangValue || $oldLangValue !== getTranslation('no-data') || $newLangValue !== getTranslation('no-data')) {
                                    $html .= '<li>' . $lang . ': <del style="color: #888; margin-left: 5px;">' . htmlspecialchars($oldLangValue) . '</del> : ' . htmlspecialchars($newLangValue) . '</li>';
                                }
                            }

                            $html .= '</ul></li>';
                        } else {
                            if (in_array($key, ['photo', 'logo', 'qk_code', 'qk_code_path', 'passport_copy'])) {
                                $formattedOldValue = $oldValue && is_string($oldValue) ? '<a href="' . asset($oldValue) . '" target="_blank" alt="' . $formattedKey . '">File</a>' : getTranslation('no-data');
                                $formattedNewValue = $newValue && is_string($newValue) ? '<a href="' . asset($newValue) . '" target="_blank" alt="' . $formattedKey . '">File</a>' : getTranslation('no-data');
                            } elseif ($key === 'is_active') {
                                $formattedOldValue = $oldValue == 1 ? getTranslation('active') : getTranslation('not-active');
                                $formattedNewValue = $newValue == 1 ? getTranslation('active') : getTranslation('not-active');
                            } elseif ($key === 'requires_visa') {
                                $formattedOldValue = $oldValue == 1 ? getTranslation('yes') : getTranslation('no');
                                $formattedNewValue = $newValue == 1 ? getTranslation('yes') : getTranslation('no');
                            } elseif ($key === 'status') {
                                $formattedOldValue = $oldValue && is_string($oldValue) ? getTranslation($oldValue) : getTranslation('no-data');
                                $formattedNewValue = $newValue && is_string($newValue) ? getTranslation($newValue) : getTranslation('no-data');
                            } else {
                                $formattedOldValue = is_scalar($oldValue) ? htmlspecialchars($oldValue) : getTranslation('no-data');
                                $formattedNewValue = is_scalar($newValue) ? htmlspecialchars($newValue) : getTranslation('no-data');
                            }

                            $html .= '<li>
                                <strong>' . $formattedKey . ':</strong>
                                <br><span style="color: #888;"><del>' . $formattedOldValue . '</del></span> :
                                <span style="color: #000; margin-left: 5px;">' . $formattedNewValue . '</span>
                            </li>';
                        }
                    }
                } else {
                    $html .= '<li style="word-wrap: break-word; white-space: normal; overflow: hidden;">' . getTranslation('no-data') . '</li>';
                }

                $html .= '</ul></div>';
            }
        }

        $html .= '</div></div></div></div></div></div><!-- /right panel -->';
        return $html;
    }
}

if (!function_exists('getTranslation')) {
    function getTranslation($slug)
    {
        // return Cache::remember("menyu.{$slug}_" . App::getLocale(), now()->addMinutes(180), function () use ($slug) {
        $translation = Translation::where('slug', $slug)->first();

        if ($translation) {
            return $translation->name[App::getLocale()] ?? $translation->name['default'];
        }

        return $slug;
        // });
    }
}

if (!function_exists('getLocale')) {
    function getLocale($model)
    {
        if (!$model || !is_array($model)) {
            return '';
        }

        $lang = App::getLocale();

        if ($lang && isset($model[$lang])) {
            return $model[$lang];
        }

        return $model['default'] ?? '';
    }
}

if (!function_exists('validateTranslation')) {
    function validateTranslation($col)
    {
        $languages = getLanguage()->pluck('name')->toArray();

        $rules = [];

        foreach ($languages as $lang) {
            $rules["$col.$lang"] = 'required|string|max:5000000';
        }

        return $rules;
    }
}
