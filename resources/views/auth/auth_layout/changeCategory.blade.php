<div class="row">
      <div class="col-md-12">
        <a href="#" class="showClick">Change Category</a>
        <div class="hidden" id="showChangeCat">
          <div class="row">
            <div class="col-md-9">
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
            </div>
          </div>
        </div>
      </div>
    </div>