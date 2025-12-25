
<div class="modal" id="myModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content custom-modal">
        <div class="modal-header border-0">
            <button type="button" class="btn-close custom-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">

      <div class="arabic-heading1 arabic-heading mb-1">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْم</div>
      <h5 class="fw-semibold mt-3 text-main-green form-heading">Quick Trial Class Request!</h5>
      
             <form id="trialForm" method="POST" action="submit.php">
              <div class="row">                
                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-3">
                    <label class="form-label small" for="trialName">Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="trialName" name="fullName" class="form-control" placeholder="Your full name" required />
                  </div>
                </div>
              
                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-3">
                    <label class="form-label small" for="trialEmail">Email Address <span class="text-danger">*</span></label>
                    <input type="email" id="trialEmail" name="emailAddress" class="form-control" placeholder="you@example.com" required />
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-3">
                    <label class="form-label small" for="trialPhone">Phone Number <span class="text-danger">*</span></label>
                    <input type="tel" id="trialPhone" name="phoneNumber" class="form-control" placeholder="+1 (123) 456-7890" required />
                  </div>
                </div>
              
                <div class="col-lg-12 col-md-12 col-12">
                  <div class="mb-3">
                    <label class="form-label small" for="trialCourse">Preferred Course</label>
                    <select id="trialCourse" name="prefCourse" class="form-select">
                      <option value="">Select a course...</option>
                      <option>Quran Reading with Tajweed</option>
                      <option>Quran Memorization (Hifz)</option>
                      <option>Kids Qaida &amp; Basics</option>
                      <option>Quran Translation &amp; Tafsir</option>
                      <option>Not sure yet</option>
                    </select>
                  </div>
                </div>
            
              </div>
              <div class="col-lg-12 col-md-12 col-12">
                <div class="mb-3">
                  <div class="g-recaptcha" data-sitekey="6Lf1oTYsAAAAALuU7j4pfhohg53vZTnxHMaCs__M"></div>
                  <div class="invalid-feedback">Please complete the reCAPTCHA verification.</div>
                </div>
              </div>
              <button type="submit" class="btn btn-main w-100 submit1" id="submitBtnTrial">
                <span class="btn-text">Request My Free Trial</span>
                <span class="spinner-border spinner-border-sm d-none" role="status"></span>
              </button>
           
            </form>
      </div>
    
    </div>
  </div>
</div>
  
  <!-- Footer -->
 
  <section class="main-footer ">

    <img src="assets/images/masjid1.webp" class="img-fluid footer-absolute-img" alt="" loading="lazy">

    <!-- Footer -->
    <footer id="contact" class="bg-main-dark text-white pt-5 pb-4">
      <div class="container">
          <div class="row gy-4">
              <div class="col-md-4 col-md-4 col-12">
                  <!-- <h5 class="fw-semibold mb-3">Quran Academy Online</h5> -->
                   <img src="assets/images/Logo-02.png" alt="Quran Academy Online Logo" class="img-fluid logo-img" style="height: 40px;" loading="lazy">
                  
                  <p class="small mt-3" style="color: rgba(255, 255, 255, 0.8); line-height: 1.6">
                      Online Quran classes with qualified teachers for kids, adults and reverts across the globe —
                      with a warm, Islamic learning environment.
                  </p>
                  
                  <!-- Social Media Links -->
                  <div class="social-links mt-3">
                      <a href="#" class="text-white me-3" style="font-size: 20px;" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="text-white me-3" style="font-size: 20px;" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                      <a href="#" class="text-white" style="font-size: 20px;" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 col-12">
                  <div class="row">
                      <div class="col-md-4">
                          <h6 class="fw-semibold mb-3">Quick Links</h6>
                          <ul class="list-unstyled small mb-0">
                              <li class="mb-2">
                                  <a
                                      href="index.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Home</a
                                  >
                              </li>
                              <li class="mb-2">
                                <a
                                    href="about.php"
                                    class="text-decoration-none"
                                    style="color: rgba(255, 255, 255, 0.8)"
                                    >About</a
                                >
                            </li>
                              <li class="mb-2">
                                  <a
                                      href="courses.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Courses</a
                                  >
                              </li>
                              <li class="mb-2">
                                  <a
                                      href="pricing.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Pricing</a
                                  >
                              </li>
                              <li class="mb-2">
                                  <a
                                      href="contact.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Contact</a
                                  >
                              </li>
                          </ul>
                      </div>
                      <div class="col-md-4">
                          <h6 class="fw-semibold mb-3">Quick Links</h6>
                          <ul class="list-unstyled small mb-0">
                              <li class="mb-2">
                                  <a
                                      href="terms-condition.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Terms & Conditions</a
                                  >
                              </li>
                              <li class="mb-2">
                                  <a
                                      href="privacy-policy.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >Privacy Policy</a
                                  >
                              </li>
                              <li class="mb-2">
                                  <a
                                      href="faq.php"
                                      class="text-decoration-none"
                                      style="color: rgba(255, 255, 255, 0.8)"
                                      >FAQ</a
                                  >
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
                            <p class="small mb-0" style="color: rgba(255, 255, 255, 0.8)">
                                <i class="bi bi-telephone me-2"></i> US : +1 (201) 5915705
                            </p>
                               <p class="small mb-0" style="color: rgba(255, 255, 255, 0.8)">
                                <i class="bi bi-telephone me-2"></i>  UK: +44 (2071) 931528
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/main.js"></script>
  
  <script>
  // Handle modal form submission
  document.addEventListener('DOMContentLoaded', function() {
      const modalForm = document.querySelector('#myModal form#trialForm');
      if (modalForm) {
          modalForm.addEventListener('submit', function(e) {
              e.preventDefault();
              
              const submitBtn = modalForm.querySelector('button[type="submit"]');
              const btnText = submitBtn.querySelector('.btn-text');
              const spinner = submitBtn.querySelector('.spinner-border');
              
              submitBtn.disabled = true;
              if (btnText) btnText.textContent = 'Sending...';
              if (spinner) spinner.classList.remove('d-none');
              
              const formData = new FormData(modalForm);
              
              fetch('submit.php', {
                  method: 'POST',
                  body: formData,
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest'
                  }
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Redirect to thank you page
                      window.location.href = 'thank-you.php';
                  } else {
                      alert(data.message || 'An error occurred. Please try again.');
                      submitBtn.disabled = false;
                      if (btnText) btnText.textContent = 'Request My Free Trial';
                      if (spinner) spinner.classList.add('d-none');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('An error occurred. Please try again later.');
                  submitBtn.disabled = false;
                  if (btnText) btnText.textContent = 'Request My Free Trial';
                  if (spinner) spinner.classList.add('d-none');
              });
          });
      }
  });
  </script>

</body>
</html>

