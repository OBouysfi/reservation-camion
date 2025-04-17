<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre soumission</title>
    <style>
        /* Styles unchanged */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
        }
        .email-container {
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .email-header {
            background: rgb(249, 115, 23);
            padding: 30px 20px;
            text-align: center;
        }
        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        .header-text {
            color: white;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        .email-content {
            padding: 30px 35px;
        }
        .greeting {
            font-size: 22px;
            font-weight: 600;
            color: #111827;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .message {
            color: #4b5563;
            font-size: 16px;
            margin-bottom: 25px;
        }
        .user-data {
            background-color: #f3f4f6;
            border-radius: 6px;
            padding: 20px 25px;
            margin-bottom: 25px;
        }
        .data-item {
            display: flex;
            margin-bottom: 12px;
        }
        .data-item:last-child {
            margin-bottom: 0;
        }
        .data-label {
            font-weight: 600;
            width: 80px;
            color: #374151;
        }
        .data-value {
            color: #4b5563;
            flex: 1;
        }
        .message-box {
            background-color: #f3f4f6;
            border-left: 4px solid rgb(249, 115, 23);
            padding: 15px;
            border-radius: 0 6px 6px 0;
            margin-top: 8px;
            font-style: italic;
            color: #4b5563;
        }
        .cta-button {
            display: inline-block;
            background-color: rgb(249, 115, 23);
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 500;
            margin-top: 5px;
            margin-bottom: 20px;
            transition: background-color 0.2s;
        }
        .cta-button:hover {
            background-color: rgb(223, 161, 119);
        }
        .email-footer {
            background-color: #f9fafb;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
        }
        .footer-links {
            margin-bottom: 10px;
        }
        .footer-link {
            color: rgb(249, 115, 23);
            text-decoration: none;
            margin: 0 10px;
        }
        .social-links {
            margin-top: 15px;
        }
        .social-icon {
            display: inline-block;
            width: 32px;
            height: 32px;
            background-color: #e5e7eb;
            border-radius: 50%;
            margin: 0 5px;
            line-height: 32px;
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .email-content {
                padding: 25px 20px;
            }
            .user-data {
                padding: 15px;
            }
            .data-item {
                flex-direction: column;
                margin-bottom: 15px;
            }
            .data-label {
                width: 100%;
                margin-bottom: 3px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- En-tête -->
        <div class="email-header">
            {{-- <img src="{{asset('Logo4.png')}}" alt="Logo de l'entreprise" class="logo">  --}}
            <h1 class="header-text">Merci de nous avoir contactés</h1>
        </div>

        <!-- Contenu de l'email -->
        <div class="email-content">
            <h2 class="greeting">Bonjour {{ $userData['name'] }},</h2>

            <p class="message">
                Merci de nous avoir contactés. Nous avons bien reçu votre message et examinons les informations que vous avez fournies.
            </p>

            <div class="user-data">
                <div class="data-item">
                    <div class="data-label">Nom :</div>
                    <div class="data-value">{{ $userData['name'] }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Email :</div>
                    <div class="data-value">{{ $userData['email'] }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Message :</div>
                    <div class="data-value">
                        <div class="message-box">{{ $userData['message'] }}</div>
                    </div>
                </div>
            </div>

            <p class="message">
                Notre équipe examinera votre demande et vous répondra dans les plus brefs délais, généralement sous 24 à 48 heures.
            </p>

            <a href="#" class="cta-button">Suivre votre demande</a>

            <p class="message">
                Si vous avez d'autres questions ou si vous avez besoin d'une assistance immédiate, n'hésitez pas à contacter notre service d'assistance.
            </p>
        </div>


    </div>
</body>
</html>
