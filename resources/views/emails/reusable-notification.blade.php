<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title }}</title>
</head>
<body style="margin:0;background:#f4f6f9;font-family:Arial,sans-serif;color:#343a40;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="padding:32px 12px;background:#f4f6f9;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:560px;background:#fff;border-radius:8px;overflow:hidden;">
                    <tr>
                        <td style="padding:24px 28px;background:#0d6efd;color:#fff;font-size:22px;font-weight:bold;">Yazıhane</td>
                    </tr>
                    <tr>
                        <td style="padding:28px;line-height:1.6;">
                            <h1 style="margin:0 0 16px;font-size:22px;">{{ $title }}</h1>
                            <p>{{ $greeting }}</p>
                            <p>{{ $messageText }}</p>
                            @if ($code)
                                <p style="margin:24px 0;padding:16px;background:#f4f6f9;text-align:center;font-size:28px;font-weight:bold;letter-spacing:6px;">{{ $code }}</p>
                            @endif
                            @if ($actionUrl && $actionText)
                                <p style="margin:24px 0;text-align:center;">
                                    <a href="{{ $actionUrl }}" style="display:inline-block;padding:12px 20px;border-radius:5px;background:#0d6efd;color:#fff;text-decoration:none;">{{ $actionText }}</a>
                                </p>
                            @endif
                            @if ($footerText)
                                <p style="margin-top:24px;color:#6c757d;font-size:13px;">{{ $footerText }}</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
