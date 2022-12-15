<?php
session_start();
include_once '../config/userAuth.php';
include_once '../inc/header.php';
?>
        <!-- main content -->
        <div class="main-content right-chat-active">
            
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                              <div class="card-body p-md-5 p-4 text-center" style="background-color:red">
                                  <h2 class="fw-700 display2-size text-white display2-md-size lh-2">Welcome to the NewInDk Commuinity!</h2>
                                  <p class="font-xss ps-lg-5 pe-lg-5 lh-28 text-grey-200">Here you can get something out from our pre-generated answers that could help if you formulated any questions in yourself.</p>
                              </div>
                            <div class="card w-100 border-0 shadow-none bg-transparent mt-3">
                                <div id="accordion" class="accordion mb-0">
                                  <div class=" accordion shadow-xss">
                                    <div class="accordion-item card-header" id="headingOne">
                                      <h3 class="accordion-header mb-0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Please read these Terms of Service carefully before using the NewInDK website
                                        </button>
                                      </h3>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                      <div class="card-body">
                                        <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.
                                           By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the Terms then you may not access the Service.
                                           We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                                           All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
                                        </p>
                                      </div>
                                    </div>
                                  </div>

                                  <div class=" accordion shadow-xss">
                                    <div class="accordion-item card-header" id="headingTwo">
                                      <h3 class="accordion-header mb-0">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Guidelines for Using Social Media
                                        </button>
                                      </h3>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                      <div class="card-body">
                                        <h4>Be smart</h4>
                                        <p>Think before you post and remember there is no such thing as a "private" social media site. It's best to avoid sharing personal information.</p>
                                        <h4>Be aware</h4>
                                        <p>You should restrict personal social media usage to your own time.</p>
                                        <h4>Be responsible</h4>
                                        <p>Do not post sensitive, confidential or proprietary information. Be sure to follow NewInDK policies regarding privacy.</p>
                                        <h4>Be respectful</h4>
                                        <p>Do not post unauthorized commercial solicitations (such as spam); bully, intimidate, or harass any user; post content that is hateful, threatening, pornographic, or that contains nudity or graphic or gratuitous violence; or do anything unlawful, misleading, malicious, or discriminatory. If the content of your message would not be acceptable for face-to-face conversation, over the telephone, or in another medium, it will not be acceptable for a social media site.</p>
                                        <h4>Be original</h4>
                                        <p>Maintain copyright and fair use laws and cite sources when possible. Don't plagiarize.</p>
                                        <h4>Be responsive</h4>
                                        <p>Refer news media (newspapers, radio stations, television reporters, etc.) in connection with the newcomers.If someone asks a question on a matter that can't be answered by you, refer them to the proper unit or person.</p>
                                        <h4>Be concise</h4>
                                        <p>Most social media platforms are built to be brief and more informal.</p>
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>
                 
            </div>            
        </div>
        <!-- main content -->
    <script src="../js/plugin.js"></script>
    <script src="../js/scripts.js"></script>
    
</body>

</html>