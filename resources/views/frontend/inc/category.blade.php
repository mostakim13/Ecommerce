@php
$categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">

            @foreach ($categories as $cat)
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{ $cat->category_icon }}"
                            aria-hidden="true"></i>
                        @if (session()->get('language') == 'bangla')
                            {{ $cat->category_name_bn }}@else{{ $cat->category_name_en }}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id', $cat->id)
                                        ->orderBy('subcategory_name_en', 'ASC')
                                        ->get();
                                @endphp
                                @foreach ($subcategories as $subcat)
                                    <div class="col-sm-12 col-md-3">
                                        @if (session()->get('language') == 'bangla')
                                            <a href="">
                                                <h2 class="title">
                                                    {{ $subcat->subcategory_name_bn }}</h2>
                                            </a>
                                        @else
                                            <a href="">
                                                <h2 class="title">
                                                    {{ $subcat->subcategory_name_en }}</h2>
                                            </a>
                                        @endif

                                        @php
                                            $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcat->id)
                                                ->orderBy('subsubcategory_name_en', 'ASC')
                                                ->get();
                                        @endphp
                                        <ul class="links list-unstyled">
                                            @foreach ($subsubcategories as $subsubcat)
                                                <li>
                                                    @if (session()->get('language') == 'bangla')
                                                        <a href="#">{{ $subsubcat->subsubcategory_name_bn }}</a>
                                                    @else
                                                        <a href="#">{{ $subsubcat->subsubcategory_name_en }}</a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.col -->
                                @endforeach

                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.menu-item -->
            @endforeach

        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
