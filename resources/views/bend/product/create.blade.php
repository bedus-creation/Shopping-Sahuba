@extends('bend.common.app')


@section('content')
<main class="app-main">
    <div class="wrapper">
        <div class="page has-sidebar">
            <div class="page-inner">
              <header class="page-title-bar">
                <h1 class="page-title"> Product Details Form </h1>
              </header>
              <div class="page-section">
                <section class="card">
                  <!-- .card-body -->
                  <div class="card-body">
                    <h3 class="card-title"> Feedback tooltip </h3>
                    <!-- form .needs-validation -->
                    <form class="needs-validation" novalidate="">
                      <!-- .form-row -->
                      <div class="form-row">
                        <!-- form grid -->
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip01">First name
                            <abbr title="Required">*</abbr>
                          </label>
                          <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required="">
                          <div class="valid-tooltip"> Looks good! </div>
                        </div>
                        <!-- /form grid -->
                        <!-- form grid -->
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip02">Last name
                            <abbr title="Required">*</abbr>
                          </label>
                          <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required="">
                          <div class="valid-tooltip"> Looks good! </div>
                        </div>
                        <!-- /form grid -->
                        <!-- form grid -->
                        <div class="col-md-12 mb-3">
                          <label for="validationTooltipUsername">Username
                            <abbr title="Required">*</abbr>
                          </label>
                          <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required="">
                          <div class="invalid-tooltip"> Please choose a username. </div>
                        </div>
                        <!-- /form grid -->
                      </div>
                      <!-- /.form-row -->
                      <!-- .form-row -->
                      <div class="form-row">
                        <!-- grid column -->
                        <div class="col-md-5 mb-3">
                          <label for="validationTooltipCountry">Country
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100" id="validationTooltipCountry" required="">
                            <option value=""> Choose... </option>
                            <option> United States </option>
                          </select>
                          <div class="invalid-feedback"> Please select a valid country. </div>
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-4 mb-3">
                          <label for="validationTooltipState">State
                            <abbr title="Required">*</abbr>
                          </label>
                          <select class="custom-select d-block w-100" id="validationTooltipState" required="">
                            <option value=""> Choose... </option>
                            <option> California </option>
                          </select>
                          <div class="invalid-feedback"> Please provide a valid state. </div>
                        </div>
                        <!-- /grid column -->
                        <!-- grid column -->
                        <div class="col-md-3 mb-3">
                          <label for="validationTooltipZip">Zip
                            <abbr title="Required">*</abbr>
                          </label>
                          <input type="text" class="form-control" id="validationTooltipZip" required="">
                          <div class="invalid-feedback"> Zip code required. </div>
                        </div>
                        <!-- /grid column -->
                      </div>
                      <!-- /.form-row -->
                      <!-- .form-group -->
                      <div class="form-group">
                        <div class="custom-control custom-checkbox mb-3">
                          <input type="checkbox" class="custom-control-input" id="validationTooltip06" required="">
                          <label class="custom-control-label" for="validationTooltip06">Agree to terms and conditions</label>
                          <div class="invalid-tooltip"> You must agree before submitting. </div>
                        </div>
                      </div>
                      <!-- /.form-group -->
                      <!-- .form-actions -->
                      <div class="form-actions">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                      </div>
                      <!-- /.form-actions -->
                    </form>
                    <!-- /form .needs-validation -->
                  </div>
                  <!-- /.card-body -->
                </section>
              </div>
            </div>
            
          </div>
          
        </div>
        
</main>

@endsection