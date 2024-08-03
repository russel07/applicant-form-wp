<div class="form-wrapper">
    <form id="applicant-form" method="post" enctype="multipart/form-data">
        <div class="field-wrapper field-row">
            <div class="col-6 field-group">
                <label for="first_name" class="input-label">First Name</label>
                <div class="form-field">
                    <input type="text" id="last_name" name="first_name" placeholder="Enter your first name" required>
                </div>
                <span class="input-help">i.e Russel</span>
            </div>

            <div class="col-6 field-group">
                <label for="last_name" class="input-label">Last Name</label>
                <div class="form-field">
                    <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required>
                </div>
                <span class="input-help">i.e Hussain</span>
            </div>
        </div>

        <div class="field-wrapper field-row">
            <div class="col-6 field-group">
                <label for="email_address" class="input-label">Email Address</label>
                <div class="form-field">
                    <input type="text" id="email_address" name="email_address" placeholder="Enter your email address" required>
                </div>
                <span class="input-help">i.e md.russel.hussain@gmail.com</span>
            </div>

            <div class="col-6 field-group">
                <label for="mobile_no" class="input-label">Mobile No</label>
                <div class="form-field">
                    <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter your mobile no" required>
                </div>
                <span class="input-help">i.e +880 172 289 2459</span>
            </div>
        </div>

        <div class="field-wrapper field-row">
            <div class="col-12 field-group">
                <label for="present_address" class="input-label">Present Address</label>
                <div class="form-field">
                    <textarea rows="4" id="present_address" name="present_address" placeholder="Enter your present address" required></textarea>
                </div>
                <span class="input-help">i.e House #191, Road #02</span>
            </div>
        </div>


        <div class="field-wrapper field-row">
            <div class="col-6 field-group">
                <label for="post_name" class="input-label">Post Name</label>
                <div class="form-field">
                    <input type="text" id="post_name" name="post_name" placeholder="Enter your post name" required>
                </div>
                <span class="input-help">i.e Sylhet</span>
            </div>

            <div class="col-6 field-group">
                <label for="cv" class="input-label">CV</label>
                <div class="form-field">
                    <input type="file" name="cv" accept=".pdf,.doc,.docx" required>
                </div>
                <span class="input-help">Upload your CV (Only PDF, DOC or DOCX)</span>
            </div>
        </div>

        <div class="field-wrapper field-row">
            <input type="submit" class="btn btn-primary" name="applicant_submit" value="Submit">
        </div>
    </form>
</div>