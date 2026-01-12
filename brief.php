<?php
$pageTitle = "Choose Your Level – Quran Online Master";
$pageDescription = "Select your learning level to get started with personalized Quran classes.";
include('includes/header.php');
?>

<style>
  body {
    background: #fff;
  }

  .desktop-menu,
  .top-bar {
    display: none !important;
  }

  .brief-page-header {
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

  .brief-header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .brief-logo {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .brief-logo-text {
    display: flex;
    flex-direction: column;
  }

  .brief-logo-text .main-text {
    font-size: 28px;
    font-weight: 700;
    color: var(--main-green, #118c5b);
    line-height: 1;
  }

  .brief-logo-text .sub-text {
    font-size: 12px;
    color: #0b1f1b;
    font-weight: 500;
  }

  .brief-contact-info {
    display: flex;
    gap: 20px;
    align-items: center;
  }

  .brief-contact-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgb(0, 0, 0);
    font-size: 14px;
    font-weight: 500;
  }

  .brief-contact-item i {
    font-size: 16px;
  }

  .level-selection-section {
    padding: 30px 0px 0px 0px;
  }

  .level-selection-header {
    text-align: center;
    margin-bottom: 50px;
  }

  .level-selection-header .arabic-text {
    color: #139cd8;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: 'Scheherazade New', serif;
  }

  .level-selection-header h2 {
    color: #0b1f1b;
    font-size: 36px;
    font-weight: 700;
    margin: 15px 0;
  }

  .level-separator {
    width: 80px;
    height: 4px;
    background: #139cd8;
    margin: 20px auto;
    border-radius: 2px;
    position: relative;
  }

  .level-separator::before,
  .level-separator::after {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-style: solid;
  }

  .level-separator::before {
    left: -15px;
    border-width: 6px 8px 6px 0;
    border-color: transparent #139cd8 transparent transparent;
  }

  .level-separator::after {
    right: -15px;
    border-width: 6px 0 6px 8px;
    border-color: transparent transparent transparent #139cd8;
  }

  .level-cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
  }

  .level-card {
    background: #fff;
    border: 2px solid #e9ecef;
    border-radius: 16px;
    padding: 0;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  .level-card:hover {
    border-color: #139cd8;
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(19, 156, 216, 0.15);
  }

  .level-card.selected {
    border-color: #139cd8;
    border-width: 3px;
    box-shadow: 0 8px 20px rgba(19, 156, 216, 0.2);
  }

  .level-card.selected .level-card-banner {
    background: #139cd8;
  }

  .level-card-check {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 28px;
    height: 28px;
    border: 2px solid #d3d3d3;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.95);
    z-index: 10;
  }

  .level-card-check::before {
    content: '✓';
    color: #d3d3d3;
    font-size: 18px;
    font-weight: bold;
    transition: all 0.3s ease;
  }

  .level-card.selected .level-card-check {
    background: #139cd8;
    border-color: #139cd8;
  }

  .level-card.selected .level-card-check::before {
    color: #fff;
  }

  .level-card-image {
    width: 100%;
    height: 180px;
    background: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
  }

  .level-card-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
  }

  .level-card-banner {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: #139cd8;
    color: #fff;
    padding: 12px;
    font-weight: 700;
    font-size: 16px;
    border-radius: 0 0 9px 9px;
  }

  .level-card-content {
    padding: 20px;
  }

  .level-card-title {
    font-size: 22px;
    font-weight: 700;
    color: #139cd8;
    margin: 15px 0 10px;
  }

  .level-card-description {
    font-size: 14px;
    color: #6c757d;
    line-height: 1.6;
  }

  .level-selection-footer {
    text-align: center;
    margin-top: 40px;
  }

  .btn-skip-next {
    background: #fe4641;
    color: #fff;
    border: none;
    padding: 14px 50px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(254, 70, 65, 0.3);
  }

  .btn-skip-next:hover {
    background: #139cd8;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(19, 156, 216, 0.4);
  }

  .btn-skip-next:disabled {
    opacity: 0.6;
    cursor: not-allowed;
  }

  .btn-lets-chat {
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

  .btn-lets-chat:hover {
    background: #0d7ba8;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(19, 156, 216, 0.4);
    color: #fff;
  }

  .btn-lets-chat i {
    font-size: 18px;
  }

  @media (max-width: 768px) {
    .brief-header-content {
      flex-direction: column;
      gap: 15px;
      text-align: center;
    }

    .brief-contact-info {
      flex-direction: column;
      gap: 10px;
    }

    .level-selection-section {
      padding: 40px 15px;
    }

    .level-selection-header h2 {
      font-size: 28px;
    }

    .level-selection-header .arabic-text {
      font-size: 24px;
    }

    .level-cards-container {
      grid-template-columns: 1fr;
      gap: 20px;
    }

    .btn-lets-chat {
      right: 15px;
      bottom: 15px;
      padding: 10px 20px;
      font-size: 14px;
    }
  }

  @media (max-width: 576px) {
    .brief-contact-info {
      display: none;
    }

    .brief-header-content {
      flex-direction: row;
    }

    .brief-logo-text .main-text {
      font-size: 22px;
    }

    .brief-contact-item {
      font-size: 12px;
    }

    .level-selection-section {
      padding: 30px 10px;
    }

    .level-selection-header h2 {
      font-size: 24px;
    }

    .level-selection-header .arabic-text {
      font-size: 20px;
    }

    .level-card-image {
      height: 180px;
    }

    .level-card-content {
      padding: 15px;
    }

    .btn-skip-next {
      padding: 12px 40px;
      font-size: 16px;
    }

    .btn-lets-chat {
      right: 10px;
      bottom: 10px;
      padding: 8px 16px;
      font-size: 12px;
    }
  }

  .detail-form-section {
    display: none;
  }

  .detail-form-section.active {
    display: block;
  }

  .detail-form-title {
    text-align: center;
    font-size: 32px;
    font-weight: 700;
    color: #0b1f1b;
    margin-bottom: 15px;
  }

  .detail-form-separator {
    width: 60px;
    height: 3px;
    background: #139cd8;
    margin: 0 auto 30px;
    border-radius: 2px;
  }

  .detail-form-group {
    margin-bottom: 25px;
  }

  .detail-form-group label {
    display: block;
    margin-bottom: 8px;
    color: #0b1f1b;
    font-weight: 500;
    font-size: 14px;
  }

  .detail-form-group input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
  }

  .detail-form-group input:focus {
    outline: none;
    border-color: #139cd8;
    box-shadow: 0 0 0 3px rgba(19, 156, 216, 0.1);
  }

  .detail-form-group .phone-input-wrapper {
    position: relative;
  }

  .spinner-border-sm {
    width: 1rem;
    height: 1rem;
    border-width: 0.15em;
  }

  .spinner-border {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    vertical-align: text-bottom;
    border: 0.25em solid currentColor;
    border-right-color: transparent;
    border-radius: 50%;
    animation: spinner-border 0.75s linear infinite;
  }

  @keyframes spinner-border {
    to {
      transform: rotate(360deg);
    }
  }

  .d-none {
    display: none !important;
  }

  .floating-whatsapp {
    position: fixed;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    width: 60px;
    height: 60px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 28px;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    z-index: 1000;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .floating-whatsapp:hover {
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
    color: #fff;
  }

  .floating-email {
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 60px;
    height: 60px;
    background: #139cd8;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    box-shadow: 0 4px 12px rgba(19, 156, 216, 0.4);
    z-index: 1000;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .floating-email:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(19, 156, 216, 0.5);
    color: #fff;
  }

  .alert-message {
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: none;
  }

  .alert-message.show {
    display: block;
  }

  .alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .alert-danger {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }

  .g-recaptcha {
    margin-bottom: 10px;
  }

  #recaptchaError {
    color: #721c24;
    font-size: 14px;
    margin-top: 5px;
    display: none;
  }

  .form-row {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .form-row input {
    width: 100%;
    padding: 10px;
    border: 1px solid #e9ecef;
    border-radius: 5px;
    font-size: 14px;
  }

  .detail-form-footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 1rem 0px 1rem 0px;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .detail-form-footer button {
    background: #fe4641;
    color: #fff;
    border: none;
    padding: 14px 50px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(254, 70, 65, 0.3);
  }

  .container.patter-2.form-section {
    padding: 4rem 0rem 0rem 0rem;
    background: url("../images/pattern2.png") center no-repeat;
    background-size: cover;
  }


  @media (max-width: 768px) {
    .detail-form-title {
      font-size: 26px;
    }

    .floating-whatsapp {
      left: 15px;
      width: 50px;
      height: 50px;
      font-size: 24px;
    }

    .floating-email {
      right: 15px;
      bottom: 15px;
      width: 50px;
      height: 50px;
      font-size: 20px;
    }
  }

  @media (max-width: 768px) {
    .detail-form-section {
      padding: 30px 15px;
    }
  }

  @media (max-width: 576px) {
    .detail-form-section {
      padding: 20px 15px;
    }

    .detail-form-title {
      font-size: 22px;
    }

    .detail-form-group {
      margin-bottom: 20px;
    }

    .floating-whatsapp {
      left: 10px;
      width: 45px;
      height: 45px;
      font-size: 20px;
    }

    .floating-email {
      right: 10px;
      bottom: 10px;
      width: 45px;
      height: 45px;
      font-size: 18px;
    }
  }
</style>


<div class="brief-page-header">
  <div class="container">
    <div class="brief-header-content">
      <div class="brief-logo">
        <a href="index.php"><img src="assets/images/Logo-02.png" alt="Quran Master Online Logo" class="img-fluid"
            style="height: 40px; margin-right: 10px;" loading="lazy"> </a>
      </div>
      <div class="brief-contact-info">
        <div class="brief-contact-item">
          <i class="bi bi-telephone"></i>
          <span>USA: +1 (646) 719-0725</span>
        </div>
        <div class="brief-contact-item">
          <i class="bi bi-telephone"></i>
          <span>UK: +44 2071 931528</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="level-selection-section container patter-2" id="levelSelectionSection">
  <div class="level-selection-header">
    <div class="arabic-text">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْم</div>
    <h2>Choose Your Level Wisely</h2>
    <div class="level-separator"></div>
  </div>
  <div class="level-cards-container">
    <div class="level-card" data-level="basic">
      <div class="level-card-check"></div>
      <div class="level-card-image">
        <div
          style="width: 100%; height: 100%; background: linear-gradient(135deg, #139cd8 0%, #0b1f1b 100%); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 48px; font-weight: bold; font-family: 'Scheherazade New', serif;">
          ق</div>
        <div class="level-card-banner">Basic Level</div>
      </div>
      <div class="level-card-content">
        <div class="level-card-title">Basic Level</div>
        <div class="level-card-description">You can select basic if you only know to read Qaida</div>
      </div>
    </div>
    <div class="level-card" data-level="intermediate">
      <div class="level-card-check"></div>
      <div class="level-card-image">
        <div
          style="width: 100%; height: 100%; background: linear-gradient(135deg, #139cd8 0%, #0b1f1b 100%); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 32px; font-weight: bold; font-family: 'Scheherazade New', serif;">
          اقرأ</div>
        <div class="level-card-banner">Intermediate Level</div>
      </div>
      <div class="level-card-content">
        <div class="level-card-title">Intermediate Level</div>
        <div class="level-card-description">You can select intermediate if you can read Quran with basic Tajweed</div>
      </div>
    </div>
    <div class="level-card" data-level="expert">
      <div class="level-card-check"></div>
      <div class="level-card-image">
        <div
          style="width: 100%; height: 100%; background: linear-gradient(135deg, #139cd8 0%, #0b1f1b 100%); display: flex; flex-direction: column; align-items: center; justify-content: center; color: #fff; font-size: 18px; padding: 20px; text-align: center; font-family: 'Scheherazade New', serif;">
          <div style="margin: 5px 0;">✓ الأحزاب</div>
          <div style="margin: 5px 0;">✓ البقرة</div>
          <div style="margin: 5px 0;">✓ الأنعام</div>
        </div>
        <div class="level-card-banner">Expert Level</div>
      </div>
      <div class="level-card-content">
        <div class="level-card-title">Expert Level</div>
        <div class="level-card-description">You can select expert if you want to memorize or perfect your Hifz</div>
      </div>
    </div>
  </div>
  <div class="level-selection-footer">
    <button type="button" class="btn-skip-next" id="skipNextBtn">Skip</button>
  </div>
</div>
<div class="container patter-2 form-section">
  <div class="detail-form-section container" id="detailFormSection">
    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <div class="detail-form-container">
          <h2 class="detail-form-title">Fill In Your Detail</h2>
          <div class="detail-form-separator"></div>
          <div id="formAlert" class="alert-message"></div>
          <form id="briefForm" class="form-row" method="POST">
            <input type="hidden" id="selectedLevel" name="prefCourse" value="">
            <input type="text" id="briefName" name="fullName" placeholder="Please Enter Your Name" required>
            <input type="email" id="briefEmail" name="emailAddress" placeholder="Please Enter Your Email" required>
            <div class="phone-input-wrapper">
              <input type="tel" id="briefPhone" name="phoneNumber" placeholder="Please Enter Your Number" required>
              <input type="hidden" id="briefCountryName" name="countryName">
              <input type="hidden" id="briefCountryCode" name="countryCode">
            </div>
            <div class="g-recaptcha" data-sitekey="6Lf1oTYsAAAAALuU7j4pfhohg53vZTnxHMaCs__M"></div>
            <div class="invalid-feedback" id="recaptchaError"
              style="display: none; color: #721c24; font-size: 14px; margin-top: 5px;">Please complete the reCAPTCHA
              verification.</div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-d col-12">
        <div class="detail-form-footer">
          <button type="submit" class="" id="continueBtn">
            <span class="btn-text">Continue</span>
            <span class="spinner-border spinner-border-sm d-none" role="status"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const levelCards = document.querySelectorAll('.level-card');
    const skipNextBtn = document.getElementById('skipNextBtn');
    const levelSelectionSection = document.getElementById('levelSelectionSection');
    const detailFormSection = document.getElementById('detailFormSection');
    const selectedLevelInput = document.getElementById('selectedLevel');
    const levelToCourse = {
      'basic': 'Basic Level - Qaida',
      'intermediate': 'Intermediate Level - Tajweed',
      'expert': 'Expert Level - Hifz/Memorization'
    };
    const briefForm = document.getElementById('briefForm');
    const continueBtn = document.getElementById('continueBtn');
    const formAlert = document.getElementById('formAlert');
    let selectedLevel = null;
    const briefPhoneInput = document.getElementById('briefPhone');
    const briefCountryNameInput = document.getElementById('briefCountryName');
    const briefCountryCodeInput = document.getElementById('briefCountryCode');
    if (briefPhoneInput && window.intlTelInput) {
      const phoneITI = window.intlTelInput(briefPhoneInput, {
        initialCountry: 'us',
        preferredCountries: ['us', 'gb', 'ca', 'au', 'pk'],
        separateDialCode: true,
        utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js'
      });
      function updateBriefCountryFields() {
        const countryData = phoneITI.getSelectedCountryData();
        if (briefCountryNameInput) briefCountryNameInput.value = countryData.name || '';
        if (briefCountryCodeInput) briefCountryCodeInput.value = countryData.iso2 ? countryData.iso2.toUpperCase() : '';
      }
      briefPhoneInput.addEventListener('countrychange', updateBriefCountryFields);
      updateBriefCountryFields();
    }
    levelCards.forEach(card => {
      card.addEventListener('click', function () {
        levelCards.forEach(c => c.classList.remove('selected'));
        this.classList.add('selected');
        selectedLevel = this.getAttribute('data-level');
        skipNextBtn.textContent = 'Next';
        skipNextBtn.disabled = false;
      });
    });
    skipNextBtn.addEventListener('click', function () {
      levelSelectionSection.style.display = 'none';
      if (selectedLevel) {
        selectedLevelInput.value = levelToCourse[selectedLevel] || selectedLevel;
      }
      detailFormSection.classList.add('active');
    });
    document.addEventListener('submit', function (e) {
      if (e.target && e.target.id === 'briefForm') {
        e.preventDefault();
        console.log('Form submit triggered');
        const form = e.target;
        const formBtn = form.querySelector('#continueBtn');
        const btnText = formBtn ? formBtn.querySelector('.btn-text') : null;
        const spinner = formBtn ? formBtn.querySelector('.spinner-border') : null;
        const alertDiv = document.getElementById('formAlert');
        if (briefPhoneInput && window.intlTelInput) {
          try {
            const phoneITI = window.intlTelInput.getInstance(briefPhoneInput);
            if (phoneITI) {
              if (phoneITI.isValidNumber()) {
                briefPhoneInput.value = phoneITI.getNumber();
                const countryData = phoneITI.getSelectedCountryData();
                if (briefCountryNameInput) briefCountryNameInput.value = countryData.name || '';
                if (briefCountryCodeInput) briefCountryCodeInput.value = countryData.iso2 ? countryData.iso2.toUpperCase() : '';
              } else {
                if (alertDiv) {
                  alertDiv.textContent = 'Please enter a valid phone number.';
                  alertDiv.classList.add('show', 'alert-danger');
                }
                return;
              }
            }
          } catch (err) {
            console.log('Phone validation skipped:', err);
          }
        }
        const nameField = form.querySelector('#briefName');
        const emailField = form.querySelector('#briefEmail');
        const recaptchaResponse = form.querySelector('[name="g-recaptcha-response"]');
        const recaptchaError = document.getElementById('recaptchaError');
        if (!nameField || !nameField.value.trim()) {
          if (alertDiv) {
            alertDiv.textContent = 'Please enter your name.';
            alertDiv.classList.add('show', 'alert-danger');
          }
          return;
        }
        if (!emailField || !emailField.value.trim() || !emailField.value.includes('@')) {
          if (alertDiv) {
            alertDiv.textContent = 'Please enter a valid email address.';
            alertDiv.classList.add('show', 'alert-danger');
          }
          return;
        }
        if (!recaptchaResponse || !recaptchaResponse.value) {
          if (recaptchaError) {
            recaptchaError.style.display = 'block';
          }
          if (alertDiv) {
            alertDiv.textContent = 'Please complete the reCAPTCHA verification.';
            alertDiv.classList.add('show', 'alert-danger');
          }
          const recaptchaElement = form.querySelector('.g-recaptcha');
          if (recaptchaElement) {
            recaptchaElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
          return;
        }
        if (recaptchaError) {
          recaptchaError.style.display = 'none';
        }
        if (formBtn) formBtn.disabled = true;
        if (btnText) btnText.textContent = 'Submitting...';
        if (spinner) spinner.classList.remove('d-none');
        if (alertDiv) alertDiv.classList.remove('show', 'alert-success', 'alert-danger');
        const formData = new FormData(form);
        console.log('Submitting form data...');
        fetch('brief-submit.php', {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
          .then(response => {
            console.log('Response received:', response.status);
            if (!response.ok) {
              throw new Error('Network response was not ok: ' + response.status);
            }
            return response.json();
          })
          .then(data => {
            console.log('Response data:', data);
            if (data.success) {
              window.location.href = 'thank-you.php';
            } else {
              if (alertDiv) {
                alertDiv.textContent = data.message || 'An error occurred. Please try again.';
                alertDiv.classList.add('show', 'alert-danger');
              }
              if (formBtn) formBtn.disabled = false;
              if (btnText) btnText.textContent = 'Continue';
              if (spinner) spinner.classList.add('d-none');
            }
          })
          .catch(error => {
            console.error('Form submission error:', error);
            if (alertDiv) {
              alertDiv.textContent = 'An error occurred. Please try again later.';
              alertDiv.classList.add('show', 'alert-danger');
            }
            if (formBtn) formBtn.disabled = false;
            if (btnText) btnText.textContent = 'Continue';
            if (spinner) spinner.classList.add('d-none');
          });
      }
    });
  });
</script>

</body>

</html>