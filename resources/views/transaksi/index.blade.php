@include('template.header')
@include('template.navbar')
@include('template.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section">
            <div class="">
                <div class="col-md-12 form-inline">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="form-inline navbar-brand" style="padding-left: 1%">Default Layout</h1>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="card-body p-0">
                                <div class="section-body">
                                    <div class="row">
                                      <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4>Line Chart</h4>
                                          </div>
                                          <div class="card-body">
                                            <canvas id="myChart"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4>Bar Chart</h4>
                                          </div>
                                          <div class="card-body">
                                            <canvas id="myChart2"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4>Doughnut Chart</h4>
                                          </div>
                                          <div class="card-body">
                                            <canvas id="myChart3"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card">
                                          <div class="card-header">
                                            <h4>Pie Chart</h4>
                                          </div>
                                          <div class="card-body">
                                            <canvas id="myChart4"></canvas>
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
    </section>
</div>

@include('template.footer')