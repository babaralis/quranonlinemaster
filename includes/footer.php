<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-backdrop="true" data-bs-keyboard="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-container">
                <button type="button" class="btn-close-popup" data-bs-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
                <div class="row align-items-center">
                    <div class="col-md-6 p-0 d-none d-md-block">
                        <div class="popup-banner-panel">
                            <div class="banner-decorative-elements">
                                <div class="banner-lantern banner-lantern-1">🪔</div>
                                <div class="banner-lantern banner-lantern-2">🪔</div>
                                <div class="banner-lantern banner-lantern-3">🪔</div>
                                <div class="banner-star banner-star-1">⭐</div>
                                <div class="banner-star banner-star-2">⭐</div>
                                <div class="banner-star banner-star-3">⭐</div>
                                <div class="banner-mosque">🕌</div>
                                <div class="banner-crescent">🌙</div>
                            </div>
                            <div class="banner-content">
                                <div class="special-offer-bag">
                                    <div class="offer-bag-outline">
                                        <div class="special-offer-text">SPECIAL<br>OFFER</div>
                                    </div>
                                    <div class="bag-ribbon bag-ribbon-left"></div>
                                    <div class="bag-ribbon bag-ribbon-right"></div>
                                </div>
                                <div class="banner-main-text">
                                    <div class="banner-text-line">GET YOUR FREE</div>
                                    <div class="banner-number-section">
                                        <span class="banner-number">07</span>
                                        <span class="banner-day-text">DAY</span>
                                    </div>
                                    <div class="banner-text-line">TRIAL WITH US</div>
                                </div>
                                <div class="banner-footer-text">
                                    BE THE FIRST TO AVAIL THIS OFFER BEFORE IT ENDS AND GET THIS AMAZING DISCOUNT
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-0">
                        <div class="popup-form-panel">
                            <div class="form-header-section">
                                <div class="form-header-text">Get Your Free</div>
                                <h3 class="form-main-title"><span class="text-green">07 Days</span> <span
                                        class="text-dark">Trial Now!</span></h3>
                                <div class="form-discount-banner">OR CLAIM 05% OFF ON YOUR FIRST PURCHASE</div>
                            </div>

                            <form id="trialForm" method="POST" action="submit.php">
                                <div class="form-field-group">
                                    <label class="form-label-custom" for="trialName">Enter Your Name Here*</label>
                                    <input type="text" id="trialName" name="fullName" class="form-control-custom"
                                        placeholder="Enter Your Name Here" required />
                                </div>

                                <div class="form-field-group">
                                    <label class="form-label-custom" for="trialEmail">Enter Your Email Here*</label>
                                    <input type="email" id="trialEmail" name="emailAddress" class="form-control-custom"
                                        placeholder="Enter Your Email Here" required />
                                </div>

                                <div class="form-field-group">
                                    <label class="form-label-custom" for="trialPhone">Enter Your Number Here*</label>
                                    <div class="phone-input-wrapper-custom">
                                        <input type="tel" id="trialPhone" name="phoneNumber" class="form-control-custom"
                                            placeholder="Enter Your Number Here" required />
                                        <input type="hidden" id="modalCountryName" name="countryName" />
                                        <input type="hidden" id="modalCountryCode" name="countryCode" />
                                    </div>
                                </div>
                                <div class="form-field-group d-flex align-items-center gap-2">
                                    <label class="form-label-custom m-0">I Want To Enroll For?</label>
                                    <div class="radio-group-custom m-0">
                                        <label class="radio-label-custom m-0">
                                            <input type="radio" name="enrollFor" value="My self" checked>
                                            <span>My Self</span>
                                        </label>
                                        <label class="radio-label-custom m-0">
                                            <input type="radio" name="enrollFor" value="My child">
                                            <span>My Child</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-field-group">
                                    <div class="g-recaptcha" data-sitekey="6Lf1oTYsAAAAALuU7j4pfhohg53vZTnxHMaCs__M"></div>
                                    <div class="invalid-feedback" id="modalRecaptchaError"
                                        style="display: none; color: #721c24; font-size: 12px; margin-top: 5px;">
                                        Please complete the reCAPTCHA verification.
                                    </div>
                                </div>

                                <button type="submit" class="btn-claim-trial" id="submitBtnTrial">
                                    <span class="btn-text">Claim 7 Days Free Trial</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main-footer ">
    <img src="assets/images/masjid1.webp" class="img-fluid footer-absolute-img" alt="" loading="lazy">
    <footer id="contact" class="bg-main-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4 col-md-4 col-12">
                    <img src="assets/images/Logo-02.png" alt="Quran Academy Online Logo" class="img-fluid logo-img"
                        style="height: 40px;" loading="lazy">
                    <p class="small mt-3" style="color: rgba(255, 255, 255, 0.8); line-height: 1.6">
                        Online Quran classes with qualified teachers for kids, adults and reverts across the globe —
                        with a warm, Islamic learning environment.
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="text-white me-3" style="font-size: 20px;" aria-label="Facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3" style="font-size: 20px;" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white" style="font-size: 20px;" aria-label="Instagram"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="row">
                        <div class="col-md-4">
                            <h6 class="fw-semibold mb-3">Quick Links</h6>
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <a href="index.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Home</a>
                                </li>
                                <li class="mb-2">
                                    <a href="about.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">About</a>
                                </li>
                                <li class="mb-2">
                                    <a href="courses.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Courses</a>
                                </li>
                                <li class="mb-2">
                                    <a href="pricing.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Pricing</a>
                                </li>
                                <li class="mb-2">
                                    <a href="contact.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h6 class="fw-semibold mb-3">Quick Links</h6>
                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <a href="terms-condition.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Terms & Conditions</a>
                                </li>
                                <li class="mb-2">
                                    <a href="privacy-policy.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">Privacy Policy</a>
                                </li>
                                <li class="mb-2">
                                    <a href="faq.php" class="text-decoration-none"
                                        style="color: rgba(255, 255, 255, 0.8)">FAQ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <h6 class="fw-semibold mb-3">Contact</h6>
                                <p class="small mb-2" style="color: rgba(255, 255, 255, 0.8)">
                                    <i class="bi bi-geo-alt me-2"></i> 846 SW Park Ave Portland, OR 97229
                                </p>
                                <p class="small mb-2" style="color: rgba(255, 255, 255, 0.8)">
                                    <i class="bi bi-envelope me-2"></i> support@quranonlinemaster.com
                                </p>
                                <p class="small mb-2" style="color: rgba(255, 255, 255, 0.8)">
                                    <i class="bi bi-telephone me-2"></i> US : +1 (201) 5915705
                                </p>
                                <p class="small mb-0" style="color: rgba(255, 255, 255, 0.8)">
                                    <i class="bi bi-telephone me-2"></i> UK: +44 (2071) 931528
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4" style="opacity: 0.3" />
            <p class="credit"> &copy; quranonlinemaster. All rights reserved.</p>
        </div>
    </footer>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    // Handle modal form submission
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize international telephone input for modal trial form
        const modalPhoneInput = document.querySelector('#myModal #trialPhone');
        const modalCountryNameInput = document.querySelector('#myModal #modalCountryName');
        const modalCountryCodeInput = document.querySelector('#myModal #modalCountryCode');
        if (modalPhoneInput) {
            const modalPhoneITI = window.intlTelInput(modalPhoneInput, {
                initialCountry: 'us',
                preferredCountries: ['us', 'gb', 'ca', 'au', 'pk'],
                separateDialCode: true,
                utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js'
            });
            // Function to update hidden country fields
            function updateModalCountryFields() {
                const countryData = modalPhoneITI.getSelectedCountryData();
                if (modalCountryNameInput) modalCountryNameInput.value = countryData.name || '';
                if (modalCountryCodeInput) modalCountryCodeInput.value = countryData.iso2 ? countryData.iso2.toUpperCase() : '';
            }
            // Update country fields on country change and initialization
            modalPhoneInput.addEventListener('countrychange', updateModalCountryFields);
            updateModalCountryFields(); // Set initial values
            // Update the input value with full international number on form submit
            const modalForm = document.querySelector('#myModal form#trialForm');
            if (modalForm) {
                modalForm.addEventListener('submit', function () {
                    if (modalPhoneITI.isValidNumber()) {
                        modalPhoneInput.value = modalPhoneITI.getNumber();
                        updateModalCountryFields(); // Ensure country data is updated before submit
                    }
                });
            }
        }
        const modalForm = document.querySelector('#myModal form#trialForm');
        if (modalForm) {
            modalForm.addEventListener('submit', function (e) {
                e.preventDefault();
                // Validate reCAPTCHA
                const recaptchaResponse = modalForm.querySelector('[name="g-recaptcha-response"]');
                const recaptchaError = document.getElementById('modalRecaptchaError');
                if (!recaptchaResponse || !recaptchaResponse.value) {
                    if (recaptchaError) {
                        recaptchaError.style.display = 'block';
                    }
                    const recaptchaElement = modalForm.querySelector('.g-recaptcha');
                    if (recaptchaElement) {
                        recaptchaElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return;
                }
                if (recaptchaError) {
                    recaptchaError.style.display = 'none';
                }
                const submitBtn = modalForm.querySelector('button[type="submit"]');
                const btnText = submitBtn.querySelector('.btn-text');
                const spinner = submitBtn.querySelector('.spinner-border');
                submitBtn.disabled = true;
                if (btnText) btnText.textContent = 'Submitting...';
                if (spinner) spinner.classList.remove('d-none');
                const formData = new FormData(modalForm);
                fetch('submit.php', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        // Check if response is OK
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Try to parse as JSON
                        return response.text().then(text => {
                            try {
                                return JSON.parse(text);
                            } catch (e) {
                                console.error('Invalid JSON response:', text);
                                throw new Error('Invalid response from server');
                            }
                        });
                    })
                    .then(data => {
                        if (data.success) {
                            // Redirect to thank you page
                            window.location.href = 'thank-you.php';
                        } else {
                            alert(data.message || 'An error occurred. Please try again.');
                            submitBtn.disabled = false;
                            if (btnText) btnText.textContent = 'Claim 7 Days Free Trial';
                            if (spinner) spinner.classList.add('d-none');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again later. Error: ' + error.message);
                        submitBtn.disabled = false;
                        if (btnText) btnText.textContent = 'Claim 7 Days Free Trial';
                        if (spinner) spinner.classList.add('d-none');
                    });
            });
        }
    });
    // Initialize modal instance
    let myModalInstance = null;

    // Global function to close modal
    window.closeModalPopup = function () {
        if (myModalInstance) {
            myModalInstance.hide();
        } else {
            const modalElement = document.getElementById('myModal');
            if (modalElement) {
                const modal = bootstrap.Modal.getInstance(modalElement);
                if (modal) {
                    modal.hide();
                } else {
                    const modalEl = bootstrap.Modal.getOrCreateInstance(modalElement);
                    modalEl.hide();
                }
            }
        }
    };

    // Initialize and auto-show modal after 5 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const modalElement = document.getElementById('myModal');
        if (modalElement) {
            // Initialize modal with proper options
            myModalInstance = new bootstrap.Modal(modalElement, {
                backdrop: true,  // Allow closing by clicking outside
                keyboard: true,  // Allow closing with ESC key
                focus: true
            });

            // Auto-show modal after 5 seconds
            setTimeout(function () {
                if (myModalInstance && modalElement) {
                    myModalInstance.show();
                }
            }, 5000);
        }
    });
</script>
</body>

</html>