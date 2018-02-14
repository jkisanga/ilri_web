<!-- Name Field -->
  <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Device Holder Registration</strong> Form
                                </div>
                                <div class="card-block">
                                    <div  class="form-horizontal ">
                                    {!! Form::open(['route' => 'admin.deviceUsers.store']) !!}


                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Holder Name</label>
                                            <div class="col-md-6">
                                                <input type="text"  name="name" class="form-control"  required="true">

                                                {{--<span class="help-block">Please enter your email</span>--}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label" >Email</label>
                                            <div class="col-md-6">
                                                <input type="email"  name="email" class="form-control" required="true" />
                                                {{--<span class="help-block">Please enter your password</span>--}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                       <label class="col-md-2 form-control-label" >Device Serial No</label>
                                       <div class="col-md-3">
                                           <input type="text"  name="IME_NO" class="form-control"  required="true">
                                           <span class="help-block">Please enter correct Serial No</span>
                                       </div>
                                   </div>

                                         <div class="form-group row">
                     <label class="col-md-2 form-control-label" >Pin Code</label>
                     <div class="col-md-3">
                         <input type="password"  name="password" class="form-control" required="true">
                         <span class="help-block">Please enter only number</span>
                     </div>
                 </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                    <button type="reset" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Reset</button>
                                </div>
                            </div>

 {!! Form::close() !!}
 </div>

</div>


