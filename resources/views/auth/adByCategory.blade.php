@extends('auth.auth_layout.main')
@section('title', 'Index')
@section('customcss')
<style>
/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  /* height: 300px; */
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  /* height: 300px; */
}
</style>
@endsection
@section('content')
<section class="services p-md-5">
    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center mb-5">POST YOUR AD</h2>
            <div class="tab">
                <?php 
                    $categories = DB::table('categories')->where('status', 1)->get();
                    
                ?>
                @foreach($categories as $key => $c)
                <button class="tablinks" onclick="openCity(event, '{{ 'abc'.$c->id }}')" @if($key == 0) id="defaultOpen" @endif>{{ $c->category_name }}</button>
                @endforeach
            </div>
            @foreach($categories as $c)
            <div id="abc{{ $c->id }}" class="tabcontent">
            <?php
                $subCategories = DB::table('sub_categories')->where('category_id', $c->id)->where('status', 1)->get();
            ?>
                <div class="list-group">
                    @foreach($subCategories as $s)
                    <a href="{{ route('post-ad-form', $s->id) }}" class="list-group-item list-group-item-action">{{ $s->sub_category }}</a>
                    @endforeach
                </div>
            </div>
            @endforeach


            <div class="clearfix"></div>
        </div>
    </div>
</section>

@endsection
@section('customjs')
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
@endsection