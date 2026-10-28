<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi murojaat</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f5fa; font-family:Arial,Helvetica,sans-serif; color:#080c24; -webkit-text-size-adjust:100%;">
    <div style="display:none; max-height:0; overflow:hidden; mso-hide:all;">{{ $data['name'] }} saytdan yangi murojaat yubordi.</div>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f5fa;">
        <tr>
            <td align="center" style="padding:40px 16px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:100%; max-width:600px; background-color:#ffffff; border:1px solid #e5eaf3; border-radius:20px; overflow:hidden; box-shadow:0 12px 40px rgba(8,12,36,0.06);">
                    <tr>
                        <td style="padding:32px; background-color:#1869fe; border-radius:20px 20px 0 0;">
                            <p style="margin:0 0 12px; font-size:11px; line-height:18px; font-weight:700; letter-spacing:2px; color:#dce8ff;">SAYTDAN KELGAN XABAR</p>
                            <h1 style="margin:0; font-size:30px; line-height:38px; font-weight:700; color:#ffffff;">Yangi murojaat</h1>
                            <p style="margin:10px 0 0; font-size:14px; line-height:22px; color:#e7efff;">Mijoz ma’lumotlari va xabari quyida keltirilgan.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 32px 0;">
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#eef4ff; border:1px solid #dce8ff; border-radius:10px;">
                                <tr>
                                    <td style="padding:14px 18px;">
                                        <p style="margin:0 0 4px; font-size:11px; line-height:16px; font-weight:700; letter-spacing:1px; color:#546987;">YUBORILGAN VAQT</p>
                                        <p style="margin:0; font-size:16px; line-height:24px; font-weight:700; color:#1869fe;">{{ $data['submitted_at'] ?? '—' }}</p>
                                        <p style="margin:3px 0 0; font-size:12px; line-height:18px; color:#6b7c96;">Toshkent vaqti &middot; UTC+5</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 32px;">
                            <p style="margin:0 0 8px; font-size:11px; line-height:18px; font-weight:700; letter-spacing:1px; color:#8390a5;">MIJOZ</p>
                            <h2 style="margin:0 0 20px; font-size:24px; line-height:32px; font-weight:700; color:#080c24; overflow-wrap:anywhere; word-break:break-word;">{{ $data['name'] }}</h2>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:14px; line-height:22px;">
                                <tr>
                                    <td width="80" valign="top" style="padding:12px 12px 12px 0; border-top:1px solid #edf0f5; color:#8390a5;">Email</td>
                                    <td valign="top" style="padding:12px 0; border-top:1px solid #edf0f5; overflow-wrap:anywhere; word-break:break-word;"><a href="mailto:{{ $data['email'] }}" style="color:#1869fe; text-decoration:none;">{{ $data['email'] }}</a></td>
                                </tr>
                                <tr>
                                    <td width="80" valign="top" style="padding:12px 12px 12px 0; border-top:1px solid #edf0f5; border-bottom:1px solid #edf0f5; color:#8390a5;">Telefon</td>
                                    <td valign="top" style="padding:12px 0; border-top:1px solid #edf0f5; border-bottom:1px solid #edf0f5; color:#26344d; overflow-wrap:anywhere; word-break:break-word;">{{ ($data['phone'] ?? '') ?: 'Ko‘rsatilmagan' }}</td>
                                </tr>
                            </table>
                            <p style="margin:28px 0 12px; font-size:11px; line-height:18px; font-weight:700; letter-spacing:1px; color:#8390a5;">XABAR MATNI</p>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f7f9fc; border-left:3px solid #1869fe; border-radius:0 10px 10px 0;">
                                <tr>
                                    <td style="padding:20px; font-size:15px; line-height:26px; color:#3f4e68; white-space:pre-wrap; overflow-wrap:anywhere; word-break:break-word;">{{ ($data['text'] ?? '') ?: 'Xabar matni kiritilmagan.' }}</td>
                                </tr>
                            </table>
                            <p style="margin:24px 0 0; font-size:13px; line-height:21px; color:#8390a5;">Mijoz bilan bog‘lanish uchun ushbu xatga javob yozishingiz mumkin.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:20px 24px; background-color:#f9fafc; border-top:1px solid #edf0f5; border-radius:0 0 20px 20px;">
                            <p style="margin:0; font-size:12px; line-height:20px; color:#99a3b5;">Ushbu xabar sayt orqali avtomatik yuborildi.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
