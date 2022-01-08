@extends('admin.layouts.master')
@section('main')
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/admin/site-settings">Site Settings</a></li>
        </ol>
    </div>
    <div class="row ">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div>
                    <div class="user-tabs mb-4">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class=""><a href="#tab1" class="active" data-toggle="tab">General</a></li>
                            <li><a href="#tab2" data-toggle="tab">Social Medias</a></li>
                            <li><a href="#tab3" data-toggle="tab">Mail Server</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane active " id="tab1">
                            <form class="form-horizontal p-5">
                                <h4 class="font-weight-bold mb-4">Appearance</h4>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Favicon</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="example-file-input-custom">
                                                    <label class="custom-file-label">Upload Images</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Twitter Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Facebook Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Analytics code</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"><i class="icon icon-question mr-4 mt-1 d-block"></i></a>
                                                <textarea class="form-control" name="example-textarea-input" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            </div>
                        </div>
                        <div class="tab-pane " id="tab2">
                            <form class="form-horizontal p-5">
                                <h4 class="font-weight-bold mb-4">Appearance</h4>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Favicon</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="example-file-input-custom">
                                                    <label class="custom-file-label">Upload Images</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Twitter Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Facebook Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Analytics code</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"><i class="icon icon-question mr-4 mt-1 d-block"></i></a>
                                                <textarea class="form-control" name="example-textarea-input" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <form class="form-horizontal p-5">
                                <h4 class="font-weight-bold mb-4">Appearance</h4>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Favicon</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="example-file-input-custom">
                                                    <label class="custom-file-label">Upload Images</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Twitter Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://twitter.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mt-2">Facebook Id</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"></a>
                                                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Analytics code</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <a href="#"><i class="icon icon-question mr-4 mt-1 d-block"></i></a>
                                                <textarea class="form-control" name="example-textarea-input" rows="4" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </form>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection