<?php
$pageTitle = "Quran Academy Online – Pricing";
$pageDescription = "One-to-one online Quran classes with Tajweed, Hifz, kids programs and Tafsir. Islamic online academy with male & female teachers and flexible timings.";
include('includes/header.php');
?>

<section class="cources-bg">
            <div class="container absolute-center">
                <div class="row justify-content-center text-center position-relative">
                    <div class="col-lg-8">
                        <h1>Contact</h1>
                        <p class="lead mb-4">
                            Certified male &amp; female Quran teachers, flexible timings, and personalized study plans
                            for kids, adults, and reverts — from anywhere in the world.
                        </p>
                    </div>
                </div>
            </div>
        </section>

   <!-- Final CTA / Contact Form -->
   <section id="trial" class="section-padding patter-1">
    <div class="container">
      <div class="row justify-content-center text-center mb-4 position-relative">
        <div class="col-lg-8">
          <span class="section-badge">
            <i class="fa fa-mosque"></i>
            Enrol Today
          </span>
           <div class="arabic-heading mt-3 mb-1">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْم</div>
          <h2 class="fw-semibold mb-2 title">Ready to Start Learning Quran Online?</h2>
          <div class="section-divider"></div>
          <p class="text-muted mt-3 mb-0">
            Fill out the form below and we will contact you with available teachers and timings in your time zone.
          </p>
        </div>
      </div>

      <div class="row gy-4 position-relative">
        <div class="col-lg-7 col-md-6 col-12">
          <div class="bg-white rounded-4 p-4 border">
            <div id="formMessage" class="alert d-none mb-3" role="alert"></div>
            <form id="contactForm" method="POST" action="submit.php">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label small" for="fullName">Full Name <span class="text-danger">*</span></label>
                  <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Your full name" required />
                  <div class="invalid-feedback">Please enter your full name.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label small" for="emailAddress">Email <span class="text-danger">*</span></label>
                  <input type="email" id="emailAddress" name="emailAddress" class="form-control" placeholder="you@example.com" required />
                  <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label small" for="prefCourse">Preferred Course</label>
                  <select id="prefCourse" name="prefCourse" class="form-select">
                    <option value="">Select a course...</option>
                    <option>Quran Reading with Tajweed</option>
                    <option>Quran Memorization (Hifz)</option>
                    <option>Kids Quran Program</option>
                    <option>Quran Translation &amp; Tafsir</option>
                    <option>Other / Not sure yet</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label small" for="prefDays">Preferred Days</label>
                  <input type="text" id="prefDays" name="prefDays" class="form-control" placeholder="e.g. Mon, Wed, Fri" />
                </div>
                <div class="col-12">
                  <label class="form-label small" for="extraDetails">Any additional details</label>
                  <textarea
                    id="extraDetails"
                    name="extraDetails"
                    class="form-control"
                    rows="3"
                    placeholder="Share age of student, current level, and preferred timings."
                  ></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-main mt-3 px-4" id="submitBtn">
                <span class="btn-text">Submit Request</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
              </button>
              <p class="small text-muted mt-2 mb-0">
                We usually respond within 12–24 hours, in shaa Allah.
              </p>
            </form>
          </div>

          <script>
          document.addEventListener('DOMContentLoaded', function() {
              const contactForm = document.getElementById('contactForm');
              const submitBtn = document.getElementById('submitBtn');
              const btnText = submitBtn.querySelector('.btn-text');
              const spinner = submitBtn.querySelector('.spinner-border');
              const formMessage = document.getElementById('formMessage');

              contactForm.addEventListener('submit', function(e) {
                  e.preventDefault();
                  
                  // Disable submit button
                  submitBtn.disabled = true;
                  btnText.textContent = 'Sending...';
                  spinner.classList.remove('d-none');
                  
                  // Hide any previous messages
                  formMessage.classList.add('d-none');
                  
                  // Get form data
                  const formData = new FormData(contactForm);
                  
                  // Send AJAX request
                  fetch('submit.php', {
                      method: 'POST',
                      body: formData
                  })
                  .then(response => response.json())
                  .then(data => {
                      // Show message
                      formMessage.classList.remove('d-none');
                      
                      if (data.success) {
                          formMessage.className = 'alert alert-success mb-3';
                          formMessage.textContent = data.message;
                          contactForm.reset();
                      } else {
                          formMessage.className = 'alert alert-danger mb-3';
                          formMessage.textContent = data.message;
                          
                          // Show field-specific errors
                          if (data.errors) {
                              for (let field in data.errors) {
                                  const input = document.getElementById(field);
                                  if (input) {
                                      input.classList.add('is-invalid');
                                  }
                              }
                          }
                      }
                      
                      // Re-enable submit button
                      submitBtn.disabled = false;
                      btnText.textContent = 'Submit Request';
                      spinner.classList.add('d-none');
                      
                      // Scroll to message
                      formMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                  })
                  .catch(error => {
                      console.error('Error:', error);
                      formMessage.classList.remove('d-none');
                      formMessage.className = 'alert alert-danger mb-3';
                      formMessage.textContent = 'An error occurred. Please try again later.';
                      
                      // Re-enable submit button
                      submitBtn.disabled = false;
                      btnText.textContent = 'Submit Request';
                      spinner.classList.add('d-none');
                  });
              });
              
              // Remove invalid class on input
              contactForm.querySelectorAll('input, select, textarea').forEach(field => {
                  field.addEventListener('input', function() {
                      this.classList.remove('is-invalid');
                  });
              });
          });
          </script>
        </div>

        <div class="col-lg-5 col-md-6 col-12">
          <h5 class="fw-semibold mb-3">Verse-by-Verse Quran Learning with Us</h5>
          <p class="small text-muted">
            Whether you are starting from the alphabet or revising your Hifz, we design a custom plan for every student
            based on age, level and goals.
          </p>
          <ul class="small text-muted mb-3">
            <li>Live one-to-one classes on Zoom or similar platforms.</li>
            <li>Beginner-friendly for kids, adults and reverts.</li>
            <li>Family discounts for multiple children or siblings.</li>
            <li>Dedicated support team via WhatsApp and email.</li>
          </ul>
          <div class="bg-white rounded-4 p-3 border small">
            <strong>WhatsApp Support:</strong><br />
            +1 (201) 591-5705 - +44 (207) 193-1528<br />
            <span class="text-muted">Message us any time for quick questions or scheduling.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="main-footer ">

    <img src="assets/images/masjid1.webp" class="img-fluid footer-absolute-img" alt="" loading="lazy">

<?php include('includes/footer.php'); ?>
