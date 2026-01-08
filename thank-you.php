<?php
$pageTitle = "Thank You - Quran Master Online";
$pageDescription = "Thank you for contacting Quran Master Online. Our support team will get back to you shortly.";
include('includes/header.php');
?>
<head>
    <!-- Event snippet for Purchase conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-17790118455/HoQfCNSLgNIbELfU_qJC',
      'value': 1.0,
      'currency': 'USD',
      'transaction_id': ''
  });
</script>
</head>

<style>
  body {
    background: #fff;
    min-height: 100vh;
  }

  /* Hide default navbar on thank-you page */
  .desktop-menu,
  .top-bar {
    display: none !important;
  }

  /* Thank You Page Header */
  .thankyou-page-header {
    background: #fff;
    padding: 15px 0;
    border-bottom: 1px solid #e9ecef;
    position: relative;
    z-index: 100;
    width: 100%;
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
  }

  .thankyou-header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .thankyou-logo {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .thankyou-contact-info {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .thankyou-contact-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #139cd8;
    font-size: 14px;
    font-weight: 500;
  }

  .thankyou-contact-item i {
    font-size: 16px;
  }

  /* Thank You Content Section */
  .thankyou-content-section {
    padding: 60px 20px;
    text-align: center;
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    background-image: 
      repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0, 0, 0, 0.01) 10px, rgba(0, 0, 0, 0.01) 20px),
      repeating-linear-gradient(-45deg, transparent, transparent 10px, rgba(0, 0, 0, 0.01) 10px, rgba(0, 0, 0, 0.01) 20px);
  }

  .thankyou-message {
    max-width: 800px;
    margin: 0 auto;
  }

  .thankyou-title {
    font-size: 48px;
    font-weight: 700;
    color: #0b1f1b;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .thankyou-subtitle {
    font-size: 24px;
    font-weight: 500;
    color: #6c757d;
    margin-bottom: 30px;
  }

  .thankyou-separator {
    width: 80px;
    height: 4px;
    background: var(--main-green, #118c5b);
    margin: 30px auto;
    border-radius: 2px;
    position: relative;
  }

  .thankyou-illustration {
    margin: 40px 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .support-illustration {
    width: 450px;
    height: 350px;
    position: relative;
    background: #fff;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    padding: 30px;
  }

  .support-desk {
    width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    align-items: flex-end;
    justify-content: center;
  }

  .support-person {
    width: 120px;
    height: 180px;
    position: relative;
    z-index: 2;
  }

  .person-body {
    width: 80px;
    height: 100px;
    background: #139cd8;
    border-radius: 40px 40px 10px 10px;
    margin: 0 auto;
    position: relative;
  }

  .person-head {
    width: 60px;
    height: 60px;
    background: #f4c46a;
    border-radius: 50%;
    margin: 0 auto 10px;
    position: relative;
  }

  .person-head::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 20px;
    background: #139cd8;
    border-radius: 20px 20px 0 0;
  }

  .support-laptop {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 200px;
    height: 140px;
    background: var(--main-green, #118c5b);
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(17, 140, 91, 0.3);
    z-index: 1;
    display: flex;
    flex-direction: column;
    padding: 15px;
  }

  .laptop-screen {
    width: 100%;
    height: 80px;
    background: #fff;
    border-radius: 8px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .chat-bubble {
    width: 60%;
    height: 20px;
    background: #e9ecef;
    border-radius: 12px;
    margin-bottom: 5px;
  }

  .chat-bubble.green {
    background: var(--main-green, #118c5b);
    margin-left: auto;
  }

  .laptop-base {
    width: 100%;
    height: 8px;
    background: #0d6e47;
    border-radius: 0 0 8px 8px;
    margin-top: 5px;
  }

  /* Floating Buttons */
  .floating-whatsapp-thankyou {
    position: fixed;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    width: 70px;
    height: 70px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 32px;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    z-index: 1000;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .floating-whatsapp-thankyou:hover {
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
    color: #fff;
  }

  .btn-see-pricing {
    position: fixed;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--main-green, #118c5b);
    color: #fff;
    border: none;
    padding: 14px 40px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(17, 140, 91, 0.3);
    z-index: 1000;
    text-decoration: none;
    display: inline-block;
  }

  .btn-see-pricing:hover {
    background: #0d6e47;
    transform: translateX(-50%) translateY(-2px);
    box-shadow: 0 6px 16px rgba(17, 140, 91, 0.4);
    color: #fff;
  }

  .btn-lets-chat-thankyou {
    position: fixed;
    right: 20px;
    bottom: 20px;
    background: #139cd8;
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(19, 156, 216, 0.3);
    z-index: 1000;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
  }

  .btn-lets-chat-thankyou:hover {
    background: #0d7ba8;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(19, 156, 216, 0.4);
    color: #fff;
  }

  .btn-lets-chat-thankyou i {
    font-size: 18px;
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    .thankyou-header-content {
      flex-direction: column;
      gap: 15px;
      text-align: center;
    }

    .thankyou-contact-info {
      flex-direction: column;
      gap: 10px;
    }

    .thankyou-content-section {
      padding: 40px 15px;
    }

    .thankyou-title {
      font-size: 36px;
    }

    .thankyou-subtitle {
      font-size: 20px;
    }

    .support-illustration {
      width: 350px;
      height: 280px;
      padding: 20px;
    }

    .support-person {
      width: 100px;
      height: 150px;
    }

    .person-body {
      width: 70px;
      height: 90px;
    }

    .person-head {
      width: 50px;
      height: 50px;
    }

    .support-laptop {
      width: 180px;
      height: 120px;
    }

    .laptop-screen {
      height: 70px;
    }

    .floating-whatsapp-thankyou {
      left: 15px;
      width: 60px;
      height: 60px;
      font-size: 28px;
    }

    .btn-see-pricing {
      bottom: 80px;
      padding: 12px 30px;
      font-size: 16px;
    }

    .btn-lets-chat-thankyou {
      right: 15px;
      bottom: 15px;
      padding: 10px 20px;
      font-size: 14px;
    }
  }

  @media (max-width: 576px) {
    .thankyou-content-section {
      padding: 30px 10px;
    }

    .thankyou-title {
      font-size: 28px;
    }

    .thankyou-subtitle {
      font-size: 18px;
    }

    .support-illustration {
      width: 280px;
      height: 220px;
      padding: 15px;
    }

    .support-person {
      width: 80px;
      height: 120px;
    }

    .person-body {
      width: 60px;
      height: 80px;
    }

    .person-head {
      width: 40px;
      height: 40px;
    }

    .support-laptop {
      width: 150px;
      height: 100px;
    }

    .laptop-screen {
      height: 60px;
      padding: 8px;
    }

    .chat-bubble {
      height: 15px;
    }

    .floating-whatsapp-thankyou {
      left: 10px;
      width: 50px;
      height: 50px;
      font-size: 24px;
    }

    .btn-see-pricing {
      bottom: 70px;
      padding: 10px 25px;
      font-size: 14px;
      width: calc(100% - 40px);
      max-width: 300px;
    }

    .btn-lets-chat-thankyou {
      right: 10px;
      bottom: 10px;
      padding: 8px 16px;
      font-size: 12px;
    }
  }
</style>

<!-- Thank You Page Header -->
<div class="thankyou-page-header">
  <div class="container">
    <div class="thankyou-header-content">
      <div class="thankyou-logo">
        <img src="assets/images/Logo-02.png" alt="Quran Master Online Logo" class="img-fluid"
          style="height: 40px; margin-right: 10px;" loading="lazy">
      </div>
      <div class="thankyou-contact-info">
        <div class="thankyou-contact-item">
          <i class="bi bi-telephone"></i>
          <span>USA: +1 (646) 719-0725</span>
        </div>
        <div class="thankyou-contact-item">
          <i class="bi bi-telephone"></i>
          <span>UK: +44 2071 931528</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Thank You Content Section -->
<div class="thankyou-content-section">
  <div class="thankyou-message">
    <h1 class="thankyou-title">Thank you!<br>Our Support team will get back to you</h1>
    <div class="thankyou-separator"></div>
    
    <div class="thankyou-illustration">
      <div class="support-illustration">
        <div class="support-desk">
          <div class="support-person">
            <div class="person-head"></div>
            <div class="person-body"></div>
          </div>
          <div class="support-laptop">
            <div class="laptop-screen">
              <div class="chat-bubble"></div>
              <div class="chat-bubble green"></div>
            </div>
            <div class="laptop-base"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Floating WhatsApp Button -->
<a href="https://api.whatsapp.com/send/?phone=442071931528&text=I+would+like+to+enroll+for+the+Quran+classes" 
   target="_blank" 
   class="floating-whatsapp-thankyou" 
   aria-label="WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<!-- See Pricing Plans Button -->
<a href="pricing.php" class="btn-see-pricing">See Pricing Plans</a>

<!-- Let's Chat Button -->
<a href="contact.php" class="btn-lets-chat-thankyou">
  <i class="bi bi-chat-dots"></i>
  <span>Let's chat!</span>
</a>

</body>
</html>
