@extends('public.layout.app')
{{--@section('title', 'Blood Donation')--}}
@section('main')
        <section
      class="hero-area"
      style="margin-bottom: 0; background-image: url('{{ asset('visitor/img/bg.jpg') }}')"
    >
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ul id="tabs" class="nav nav-tabs">
              <li class="nav-item">
                <a
                  href="#"
                  data-target="#blood-donor"
                  data-toggle="tab"
                  class="nav-link small text-uppercase active"
                >
                  Blood Donor Directory
                  <small class="en">Find donors</small>
                </a>
              </li>
            </ul>
            <div id="tabsContent" class="tab-content">
              <div id="blood-donor" class="tab-pane fade active show">
                <div class="row">
                  <div class="col-sm-12">
                    <form
                      action="/blood-donor"
                      class="check-form" method="get"
                    >
                      <input type="hidden" name="area" class="areaSlug" />
                      <div class="room-selector search-area">
                         <select class="form-control" name="blood_group">
                          <option value="">Location</option>
                          <option value="1">Dhaka</option>
                          <option value="3">Chittagong</option>
                        </select>
                      </div>
                      <div class="room-selector search-blood">
                        <select class="form-control" name="blood_group">
                          <option value="">Select Blood Group</option>
                          <option value="A+" >A+</option>
                          <option value="A-" >A-</option>
                          <option value="B+" >B+</option>
                          <option value="B-" >B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="O+" >O+</option>
                          <option value="O-" >O-</option>
                        </select>
                      </div>
                      <div class="room-selector search-btn">
                        <button
                          type="submit"
                          class="primary-btn"
                          title="Find Now"
                        >
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="award-section small_device_award">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-12">
            <div class="award-item">
              <h2><i class="fa fa-user-plus" aria-hidden="true"></i></h2>
              <h4>Step - 1</h4>
              <h3>Registration</h3>
              <span>Register for free</span>
              <p>
                Your little help can save life.
              </p>
{{--              <a href="register.html" class="primary-btn">Register</a>--}}
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="award-item">
              <h2><i class="fa fa-user-md" aria-hidden="true"></i></h2>
              <h4>Step - 2</h4>
              <h3>Blood Test</h3>
              <span>Verify your blood group</span>
              <p>
               Find out if there are any germs in the blood

              </p>
    {{--              <a href="#" class="primary-btn"--}}
    {{--                >Verify Now</a--}}
    {{--              >--}}
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="award-item">
              <h2><i class="fa fa-heartbeat" aria-hidden="true"></i></h2>
              <h4>Step - 3</h4>
              <h3>Donate Blood</h3>
              <span>Save life by donation blood</span>
              <p>
                Blood donation completed in just 10-15 minutes.
              </p>
{{--              <a href="#" class="primary-btn">Why need to donate blood</a>--}}
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Award Section End -->

    <!-- Home Page About Section Begin -->
    <section class="homepage-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center mt-4 mb-5">
              OUR FEATURES
            </h2>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4 col-sm-12">
            <div class="about-img">
              <h4>Data Security</h4>
              <p>Your mobile number and email will not be displayed directly</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="about-img">
              <h4>Holiday Mode</h4>
              <p>You can temporarily stay offline</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="about-img">
              <h4>Many Place</h4>
              <p>If you want, you can choose more than one place to donate blood</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home Page About Section End -->

    <!-- Intro Text Section Begin -->
    <section class="intro-section">
      <div class="container">
        <div class="row intro-text">
          <div class="col-lg-6">
            <div class="intro-left">
              <div class="section-title">
                <span>Moving forward for the welfare of humanity</span>
                <h2>We are in your town</h2>
              </div>
              <p>
              We are now in your city. Registration now and be a proud member of the our family and continue to serve humanity.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="intro-right">
              <a href="register.html" class="primary-btn"
                >Join as a volunteer</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Intro Text Section End -->
@endsection
