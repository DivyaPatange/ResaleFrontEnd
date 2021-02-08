<!-- Sidebar -->
<div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
    <!-- Bootstrap List Group -->
    <ul class="list-group">
        <a href="#" data-toggle="sidebar-colapse" class="list-group-item list-group-item-action d-flex align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                <span id="collapse-text" class="menu-collapsed">Collapse</span>
            </div>
        </a>
        <?php 
            $categories = DB::table('categories')->where('status', 1)->get();
        ?>
        @foreach($categories as $key => $c)
        <!-- /END Separator -->
        <!-- Menu with submenu -->
        <a href="#submenu{{$c->id}}" data-toggle="collapse" aria-expanded="false" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="mr-3">
                    <img src="https://admin.resale99.com/categoryIcon/{{ $c->category_icon }}" alt="" width="30px">
                </span> 
                <span class="menu-collapsed">{{$c->category_name}}</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
            <!-- Submenu content -->
            <div id="submenu{{$c->id}}" class="collapse sidebar-submenu">
                <?php $subcategories = DB::table('sub_categories')->where('category_id', $c->id)->where('status',1)->get();?>
                @foreach($subcategories as $s )
                <a href="@if(($s->sub_category == "Cars") || ($s->sub_category == "Spare Parts - Accessories")) {{ route('sidebar.car.post', $s->id) }} @elseif($s->sub_category == "Commercial Vehicles") {{route('allCommercialVehiclePost') }} @elseif($s->sub_category == "Mobile Phones") {{route('allMobilePhonePost') }} @elseif($s->sub_category == "Tablets") {{ route('allTabletsPost') }} @elseif($c->category_name == "Jobs") {{ route('sidebar.job.post', $s->id) }} @elseif(($s->sub_category == "Motorcycles") || ($s->sub_category == "Scooters") || ($s->sub_category == "Bicycles")) {{ route('sidebar.bike.post', $s->id) }} @elseif($s->sub_category == "Spare Parts") {{ route('allSparePartsPost') }} @elseif($c->category_name == "Electronic Appliances") {{ route('sidebar.electronic.post', $s->id) }} @elseif($c->category_name == "Furniture") {{ route('sidebar.furniture.post', $s->id) }} @else # @endif" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">{{$s->sub_category}}</span>
                </a>
                @endforeach
            </div>
        @endforeach
    </ul><!-- List Group END-->
</div>