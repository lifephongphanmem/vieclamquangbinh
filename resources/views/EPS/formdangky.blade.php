@extends('EPS.index')
@section('content')
<div class="row">
    <div class="col-md-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Base Controls</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form>
                <div class="card-body">
                    <div class="form-group mb-8">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email address
                        <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter email" />
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password
                        <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                    </div>
                    <div class="form-group">
                        <label>Static:</label>
                        <p class="form-control-plaintext text-muted">email@example.com</p>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Example select
                        <span class="text-danger">*</span></label>
                        <select class="form-control" id="exampleSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect2">Example multiple select
                        <span class="text-danger">*</span></label>
                        <select multiple="multiple" class="form-control" id="exampleSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group mb-1">
                        <label for="exampleTextarea">Example textarea
                        <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">


                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Textual HTML5 Inputs</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form>
                <div class="card-body">
                    <div class="form-group mb-8">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">Here are examples of
                            <code>.form-control</code>applied to each textual HTML5 input type:</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Text</label>
                        <div class="col-10">
                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Search</label>
                        <div class="col-10">
                            <input class="form-control" type="search" value="How do I shoot web" id="example-search-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-url-input" class="col-2 col-form-label">URL</label>
                        <div class="col-10">
                            <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                        <div class="col-10">
                            <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">Password</label>
                        <div class="col-10">
                            <input class="form-control" type="password" value="hunter2" id="example-password-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-number-input" class="col-2 col-form-label">Number</label>
                        <div class="col-10">
                            <input class="form-control" type="number" value="42" id="example-number-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                        <div class="col-10">
                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label">Date</label>
                        <div class="col-10">
                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-month-input" class="col-2 col-form-label">Month</label>
                        <div class="col-10">
                            <input class="form-control" type="month" value="2011-08" id="example-month-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-week-input" class="col-2 col-form-label">Week</label>
                        <div class="col-10">
                            <input class="form-control" type="week" value="2011-W33" id="example-week-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-time-input" class="col-2 col-form-label">Time</label>
                        <div class="col-10">
                            <input class="form-control" type="time" value="13:45:00" id="example-time-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-color-input" class="col-2 col-form-label">Color</label>
                        <div class="col-10">
                            <input class="form-control" type="color" value="#563d7c" id="example-color-input" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Range</label>
                        <div class="col-10">
                            <input class="form-control" type="range" />
                        </div>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">
<code class="language-html">
&lt;div class="card card-custom"&gt;
&lt;div class="card-header"&gt;
&lt;h3 class="card-title"&gt;
Textual HTML5 Inputs
&lt;/h3&gt;
&lt;/div&gt;
&lt;!--begin::Form--&gt;
&lt;form&gt;
&lt;div class="card-body"&gt;
&lt;div class="form-group mb-8"&gt;
&lt;div class="alert alert-custom alert-default" role="alert"&gt;
&lt;div class="alert-icon"&gt;&lt;i class="flaticon-warning text-primary"&gt;&lt;/i&gt;&lt;/div&gt;
&lt;div class="alert-text"&gt;
Here are examples of &lt;code&gt;.form-control&lt;/code&gt; applied to each textual HTML5 input type:
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label  class="col-2 col-form-label"&gt;Text&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="text" value="Artisanal kale" id="example-text-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-search-input" class="col-2 col-form-label"&gt;Search&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="search" value="How do I shoot web" id="example-search-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-email-input" class="col-2 col-form-label"&gt;Email&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-url-input" class="col-2 col-form-label"&gt;URL&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-tel-input" class="col-2 col-form-label"&gt;Telephone&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-password-input" class="col-2 col-form-label"&gt;Password&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="password" value="hunter2" id="example-password-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-number-input" class="col-2 col-form-label"&gt;Number&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="number" value="42" id="example-number-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-datetime-local-input" class="col-2 col-form-label"&gt;Date and time&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-date-input" class="col-2 col-form-label"&gt;Date&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="date" value="2011-08-19" id="example-date-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-month-input" class="col-2 col-form-label"&gt;Month&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="month" value="2011-08" id="example-month-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-week-input" class="col-2 col-form-label"&gt;Week&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="week" value="2011-W33" id="example-week-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-time-input" class="col-2 col-form-label"&gt;Time&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="time" value="13:45:00" id="example-time-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-color-input" class="col-2 col-form-label"&gt;Color&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="color" value="#563d7c" id="example-color-input"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row"&gt;
&lt;label for="example-email-input" class="col-2 col-form-label"&gt;Range&lt;/label&gt;
&lt;div class="col-10"&gt;
&lt;input class="form-control" type="range"/&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;div class="row"&gt;
&lt;div class="col-2"&gt;
&lt;/div&gt;
&lt;div class="col-10"&gt;
&lt;button type="reset" class="btn btn-success mr-2"&gt;Submit&lt;/button&gt;
&lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/form&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <button type="reset" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Solid Background Style</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group form-group-last">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">Add the
                            <code>.form-controller-solid</code>class on an input to have an input with solid background.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Input</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Example input" />
                    </div>
                    <div class="form-group">
                        <label>Select</label>
                        <select class="form-control form-control-solid">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Textarea</label>
                        <textarea class="form-control form-control-solid" rows="3"></textarea>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">
<code class="language-html">
&lt;div class="card card-custom"&gt;
&lt;div class="card-header"&gt;
&lt;h3 class="card-title"&gt;
Input States
&lt;/h3&gt;
&lt;/div&gt;
&lt;!--begin::Form--&gt;
&lt;form class="form"&gt;
&lt;div class="card-body"&gt;
&lt;div class="form-group form-group-last"&gt;
&lt;div class="alert alert-custom alert-default" role="alert"&gt;
&lt;div class="alert-icon"&gt;&lt;i class="flaticon-warning text-primary"&gt;&lt;/i&gt;&lt;/div&gt;
&lt;div class="alert-text"&gt;
Add the &lt;code&gt;disabled&lt;/code&gt; or &lt;code&gt;readonly&lt;/code&gt; boolean attribute on an input to prevent user interactions.
Disabled inputs appear lighter and add a &lt;code&gt;not-allowed&lt;/code&gt; cursor.
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Input&lt;/label&gt;
&lt;input type="email" class="form-control form-control-solid" placeholder="Example input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Select&lt;/label&gt;
&lt;select class="form-control form-control-solid"&gt;
&lt;option&gt;1&lt;/option&gt;
&lt;option&gt;2&lt;/option&gt;
&lt;option&gt;3&lt;/option&gt;
&lt;option&gt;4&lt;/option&gt;
&lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleTextarea"&gt;Textarea&lt;/label&gt;
&lt;textarea class="form-control form-control-solid" rows="3"&gt;&lt;/textarea&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;button type="reset" class="btn btn-primary mr-2"&gt;Submit&lt;/button&gt;
&lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
&lt;/form&gt;
&lt;!--end::Form--&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    <div class="col-md-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Input States</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group form-group-last">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">Add the
                            <code>disabled</code>or
                            <code>readonly</code>boolean attribute on an input to prevent user interactions. Disabled inputs appear lighter and add a
                            <code>not-allowed</code>cursor.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Disabled Input</label>
                        <input type="email" class="form-control" disabled="disabled" placeholder="Disabled input" />
                    </div>
                    <div class="form-group">
                        <label>Disabled select</label>
                        <select class="form-control" disabled="disabled">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Disabled textarea</label>
                        <textarea class="form-control" disabled="disabled" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Readonly Input</label>
                        <input type="email" class="form-control" readonly="readonly" placeholder="Readonly input" />
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Readonly textarea</label>
                        <textarea class="form-control" readonly="readonly" rows="3"></textarea>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">
<code class="language-html">
&lt;div class="card card-custom"&gt;
&lt;div class="card-header"&gt;
&lt;h3 class="card-title"&gt;
Input States
&lt;/h3&gt;
&lt;/div&gt;
&lt;!--begin::Form--&gt;
&lt;form class="form"&gt;
&lt;div class="card-body"&gt;
&lt;div class="form-group form-group-last"&gt;
&lt;div class="alert alert-custom alert-default" role="alert"&gt;
&lt;div class="alert-icon"&gt;&lt;i class="flaticon-warning text-primary"&gt;&lt;/i&gt;&lt;/div&gt;
&lt;div class="alert-text"&gt;
Add the &lt;code&gt;disabled&lt;/code&gt; or &lt;code&gt;readonly&lt;/code&gt; boolean attribute on an input to prevent user interactions.
Disabled inputs appear lighter and add a &lt;code&gt;not-allowed&lt;/code&gt; cursor.
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Disabled Input&lt;/label&gt;
&lt;input type="email" class="form-control" disabled="disabled" placeholder="Disabled input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Disabled select&lt;/label&gt;
&lt;select class="form-control" disabled="disabled"&gt;
&lt;option&gt;1&lt;/option&gt;
&lt;option&gt;2&lt;/option&gt;
&lt;option&gt;3&lt;/option&gt;
&lt;option&gt;4&lt;/option&gt;
&lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleTextarea"&gt;Disabled textarea&lt;/label&gt;
&lt;textarea class="form-control" disabled="disabled" rows="3"&gt;&lt;/textarea&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Readonly Input&lt;/label&gt;
&lt;input type="email" class="form-control" readonly placeholder="Readonly input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleTextarea"&gt;Readonly textarea&lt;/label&gt;
&lt;textarea class="form-control" readonly rows="3"&gt;&lt;/textarea&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;button type="reset" class="btn btn-primary mr-2"&gt;Submit&lt;/button&gt;
&lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
&lt;/form&gt;
&lt;!--end::Form--&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Input Sizing</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group form-group-last">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">Set heights using classes like
                            <code>.form-control-lg</code>, and set widths using grid column classes like
                            <code>.col-lg-*</code></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Large Input</label>
                        <input type="email" class="form-control form-control-lg" placeholder="Large input" />
                    </div>
                    <div class="form-group">
                        <label>Default Input</label>
                        <input type="email" class="form-control" placeholder="Large input" />
                    </div>
                    <div class="form-group">
                        <label>Small Input</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Large input" />
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectl">Large Select</label>
                        <select class="form-control form-control-lg" id="exampleSelectl">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectd">Default Select</label>
                        <select class="form-control" id="exampleSelectd">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelects">Small Select</label>
                        <select class="form-control form-control-sm" id="exampleSelects">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">
<code class="language-html">
&lt;div class="card card-custom"&gt;
&lt;div class="card-header"&gt;
&lt;h3 class="card-title"&gt;
Input Sizing
&lt;/h3&gt;
&lt;/div&gt;
&lt;!--begin::Form--&gt;
&lt;form class="form"&gt;
&lt;div class="card-body"&gt;
&lt;div class="form-group form-group-last"&gt;
&lt;div class="alert alert-custom alert-default" role="alert"&gt;
&lt;div class="alert-icon"&gt;&lt;i class="flaticon-warning text-primary"&gt;&lt;/i&gt;&lt;/div&gt;
&lt;div class="alert-text"&gt;
Set heights using classes like &lt;code&gt;.form-control-lg&lt;/code&gt;, and set widths using grid column classes like &lt;code&gt;.col-lg-*&lt;/code&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Large Input&lt;/label&gt;
&lt;input type="email" class="form-control form-control-lg"  placeholder="Large input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Default Input&lt;/label&gt;
&lt;input type="email" class="form-control"  placeholder="Large input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Small Input&lt;/label&gt;
&lt;input type="email" class="form-control form-control-sm"  placeholder="Large input"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleSelectl"&gt;Large Select&lt;/label&gt;
&lt;select class="form-control form-control-lg" id="exampleSelectl"&gt;
&lt;option&gt;1&lt;/option&gt;
&lt;option&gt;2&lt;/option&gt;
&lt;option&gt;3&lt;/option&gt;
&lt;option&gt;4&lt;/option&gt;
&lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleSelectd"&gt;Default Select&lt;/label&gt;
&lt;select class="form-control" id="exampleSelectd"&gt;
&lt;option&gt;1&lt;/option&gt;
&lt;option&gt;2&lt;/option&gt;
&lt;option&gt;3&lt;/option&gt;
&lt;option&gt;4&lt;/option&gt;
&lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label for="exampleSelects"&gt;Small Select&lt;/label&gt;
&lt;select class="form-control form-control-sm" id="exampleSelects"&gt;
&lt;option&gt;1&lt;/option&gt;
&lt;option&gt;2&lt;/option&gt;
&lt;option&gt;3&lt;/option&gt;
&lt;option&gt;4&lt;/option&gt;
&lt;option&gt;5&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;button type="reset" class="btn btn-success mr-2"&gt;Submit&lt;/button&gt;
&lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
&lt;/form&gt;
&lt;!--end::Form--&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-custom example example-compact">
            <div class="card-header">
                <h3 class="card-title">Custom Controls</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form">
                <div class="card-body">
                    <div class="form-group form-group-last">
                        <div class="alert alert-custom alert-default" role="alert">
                            <div class="alert-icon">
                                <span class="svg-icon svg-icon-primary svg-icon-xl">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                            <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <div class="alert-text">For even more customization and cross browser consistency, use our completely custom form elements to replace the browser defaults. They’re built on top of semantic and accessible markup, so they’re solid replacements for any default form control.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Custom Range</label>
                        <div></div>
                        <input type="range" class="custom-range" min="0" max="5" id="customRange2" />
                    </div>
                    <div class="form-group">
                        <label>Custom Select</label>
                        <div></div>
                        <select class="custom-select form-control">
                            <option selected="selected">Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File Browser</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" />
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <!--begin: Code-->
                    <div class="example-code mt-10">
                        <div class="example-highlight">
                            <pre style="height:400px">
<code class="language-html">
&lt;div class="card card-custom"&gt;
&lt;div class="card-header"&gt;
&lt;h3 class="card-title"&gt;
Custom Controls
&lt;/h3&gt;
&lt;/div&gt;
&lt;!--begin::Form--&gt;
&lt;form class="form"&gt;
&lt;div class="card-body"&gt;
&lt;div class="form-group form-group-last"&gt;
&lt;div class="alert alert-custom alert-default" role="alert"&gt;
&lt;div class="alert-icon"&gt;&lt;i class="flaticon-warning text-primary"&gt;&lt;/i&gt;&lt;/div&gt;
&lt;div class="alert-text"&gt;
For even more customization and cross browser consistency, use our completely custom form elements to replace the browser defaults. They’re built on top of semantic and accessible markup, so they’re solid replacements for any default form control.
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Custom Range&lt;/label&gt;
&lt;div&gt;&lt;/div&gt;
&lt;input type="range" class="custom-range" min="0" max="5" id="customRange2"/&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;Custom Select&lt;/label&gt;
&lt;div&gt;&lt;/div&gt;
&lt;select class="custom-select form-control"&gt;
&lt;option selected&gt;Open this select menu&lt;/option&gt;
&lt;option value="1"&gt;One&lt;/option&gt;
&lt;option value="2"&gt;Two&lt;/option&gt;
&lt;option value="3"&gt;Three&lt;/option&gt;
&lt;/select&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;
&lt;label&gt;File Browser&lt;/label&gt;
&lt;div&gt;&lt;/div&gt;
&lt;div class="custom-file"&gt;
&lt;input type="file" class="custom-file-input" id="customFile"/&gt;
&lt;label class="custom-file-label" for="customFile"&gt;Choose file&lt;/label&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;div class="card-footer"&gt;
&lt;button type="reset" class="btn btn-primary mr-2"&gt;Submit&lt;/button&gt;
&lt;button type="reset" class="btn btn-secondary"&gt;Cancel&lt;/button&gt;
&lt;/div&gt;
&lt;/form&gt;
&lt;!--end::Form--&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                    </div>
                    <!--end: Code-->
                </div>
                <div class="card-footer">
                    <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>