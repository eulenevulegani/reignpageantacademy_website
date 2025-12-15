<?php
/* Template Name: Audition Page */
get_header(); 
?>

    <!-- Page Header -->
    <section class="section-padding" style="padding-top: 150px; background: url('https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover; position: relative;">
        <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.8);"></div>
        <div class="container text-center" style="position: relative; z-index: 2;">
            <h1 class="text-gold">Miss Progress Kenya</h1>
            <p>Audition Application Form</p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="section-padding">
        <div class="container">
            <div class="form-container fade-in-up">
                <!-- Note: In WordPress, this would likely be a shortcode for Gravity Forms or Contact Form 7 -->
                <form id="auditionForm">
                    <h3 style="margin-bottom: 2rem; border-bottom: 1px solid #333; padding-bottom: 1rem;">Personal Details</h3>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" placeholder="Jane Doe" required>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" placeholder="175" required>
                        </div>
                        <div class="form-group">
                            <label>City of Residence</label>
                            <input type="text" placeholder="Nairobi" required>
                        </div>
                    </div>

                    <h3 style="margin-bottom: 2rem; border-bottom: 1px solid #333; padding-bottom: 1rem; margin-top: 2rem;">Contact Info</h3>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="jane@example.com" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="+254 700 000000" required>
                    </div>

                    <div class="form-group">
                        <label>Instagram Handle</label>
                        <input type="text" placeholder="@yourhandle" required>
                    </div>

                    <h3 style="margin-bottom: 2rem; border-bottom: 1px solid #333; padding-bottom: 1rem; margin-top: 2rem;">Audition Materials</h3>

                    <div class="form-group">
                        <label>Upload Headshot (Max 5MB)</label>
                        <div class="file-upload-box">
                            <i class="fas fa-camera text-gold" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                            <p>Click to browse or drag image here</p>
                            <input type="file" accept="image/*" style="display: none;" id="headshot">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Upload Full Body Shot (Max 5MB)</label>
                        <div class="file-upload-box">
                            <i class="fas fa-female text-gold" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                            <p>Click to browse or drag image here</p>
                            <input type="file" accept="image/*" style="display: none;" id="bodyshot">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Why do you want to be Miss Progress Kenya? (Short Bio)</label>
                        <textarea rows="5" placeholder="Tell us about yourself and your advocacy..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Submit Application</button>

                </form>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
