<?php
// email-template.php
/**
 * Renders a full HTML email given a title and body HTML.
 * Pulls logo URL and support contacts from config.php.
 */
function renderEmailTemplate(string $title, string $bodyHtml): string {
    $config = require __DIR__ . '/config.php';
    $logoUrl       = $config['logo_url'];         
    $supportEmail  = $config['support_email'];    
    $supportPhone  = $config['support_phone'];   

    return <<<HTML
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{$title}</title>
  <style>
    body { 
      margin:0; 
      padding:0; 
      font-family: Arial, sans-serif; 
    }
    .header { 
      background: #222222; 
      padding: 20px; 
      text-align: center; 
    }
    .header img { 
      max-height: 60px; 
    }
    .content { 
      background: #ffffff; 
      padding: 30px; 
      color: #333; }
    .footer { 
      background: #222222; 
      padding: 15px; 
      text-align: center; 
      color: #aaaaaa; 
      font-size: 0.9em; }
    .footer a { 
      color: #4ea1f3; 
      text-decoration: none; 
    }
  </style>
</head>
<body>
  <div class="header">
    <img src="cid:logo_cid" alt="Logo">

  </div>
  <div class="content">
    {$bodyHtml}
  </div>
  <div class="footer">
    Need help? Email <a href="mailto:{$supportEmail}">{$supportEmail}</a> or call {$supportPhone}
  </div>
</body>
</html>
HTML;
}
