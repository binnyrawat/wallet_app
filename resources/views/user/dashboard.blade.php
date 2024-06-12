@extends('layout.master')
@section('section')
<section>
    <div class="custom-container">
      <div class="title">
        <h2>My Saving Plans</h2>
        <a href="saving-plans.html">See all</a>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="saving-plan-box">
            <div class="saving-plan-icon">
              <img class="img-fluid" src="assets/images/svg/10.svg" alt="p10" />
            </div>
            <h3>New Car</h3>
            <h6>Amount left</h6>
            <div class="progress" role="progressbar" aria-label="progressbar" aria-valuenow="0" aria-valuemin="0"
              aria-valuemax="100">
              <div class="progress-bar bar1"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
              <h5 class="theme-color">$2,000.00</h5>
              <img class="img-fluid arrow" src="assets/images/svg/arrow.svg" alt="arrow" />
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="saving-plan-box">
            <div class="saving-plan-icon">
              <img class="img-fluid" src="assets/images/svg/11.svg" alt="p11" />
            </div>
            <h3>Grand Home</h3>
            <h6>Amount left</h6>
            <div class="progress" role="progressbar" aria-label="progressbar" aria-valuenow="0" aria-valuemin="0"
              aria-valuemax="100">
              <div class="progress-bar bar2"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-2">
              <h5 class="theme-color">$2,000.00</h5>
              <img class="img-fluid arrow" src="assets/images/svg/arrow.svg" alt="arrow" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection