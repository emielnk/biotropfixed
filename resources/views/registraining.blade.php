@extends ('layouts.dashboardloggedin')
@section('page_heading','Form')
@section('section')
    
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>    
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="POST" action="/registertraining/join/{{ $get->id_training }}">
            <h2> Apply {{ $get->nama_training }} </h2>     
            <br>       
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                        <label> Recent Research </label>
                        <p> tell us your recently completed research and/or projects </p>
                        <textarea name="recentResearch" value=""class = "form-control" rows="5" autofocus>{{ old('"recentResearch') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                         <label> Published Works  </label>
                         <p> tell us your published works in las 3 years </p>
                        <textarea name="recentPublishedWorks" value="" class = "form-control" rows="5" autofocus>{{ old('recentPublishedWorks') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                        <label> Trainings or Seminar Attended  </label>
                        <p> State trainings, seminars, or confrence you attended in las 2 years </p>
                        <p> please indicate date, venue, and name of organizer </p>      
                        <textarea name="recentAttended" value="" class = "form-control" rows="5" autofocus>{{ old('recentAttended') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                         <label> Reasons Apply this Trainings  </label>
                         <p> state briefly your reasons for applying this trainings </p>
                        <textarea name="reasonForJoin" value="" class = "form-control" rows="5" autofocus>{{ old('reasonForJoin') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-10">
                         <label> Use of Trainings  </label>
                         <p> state briefly how you will use the learnings you will get from this training </p>
                        <textarea name="useTheLearnings" value="" class = "form-control" rows="5" autofocus>{{ old('useTheLearnings') }}</textarea>
                    </div>
                </div>
            </div>   
            <br>
            <button type="submit" class="btn btn-default">Submit Button</button>
            <button type="reset" class="btn btn-default">Reset Button</button>
            {{ csrf_field() }}
        </form>
    </div>
    </div>
</div>
@stop
