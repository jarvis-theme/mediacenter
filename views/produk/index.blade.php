<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="breadcrumb-nav-holder"> 
                    <ul>
                        <li class="breadcrumb-item">
                            <a href="{{url::to('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item current gray">
                            <a href="{{url::to('produk')}}">Produk</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div>
<section class="sidebar-page">
    <div class="container">
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
            <!-- ========================================= CATEGORY TREE ========================================= -->
            @if(count(list_category()) > 0)
            <div class="widget accordion-widget category-accordions">
                <h1 class="border">Kategori</h1>
                <div class="accordion">
                    @foreach(list_category() as $side_menu)
                    @if($side_menu->parent == '0')
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            @if(count($side_menu->anak) >= 1)
                            <a class="accordion-toggle collapsed" data-toggle="collapse" href="#{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}">
                             @else
                            <a class="collapsed" href="{{category_url($side_menu)}}">
                            @endif  
                                {{short_description($side_menu->nama,23)}}
                            </a>
                        </div>
                        @if($side_menu->anak->count() != 0)
                        <div id="{{short_description(preg_replace('/[^a-zA-Z0-9-]/', '', $side_menu->nama),23)}}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <ul>
                                    @foreach($side_menu->anak as $submenu)
                                    @if($submenu->parent == $side_menu->id)
                                    <li>
                                        <div class="accordion-heading">
                                            @if(count($submenu->anak) >= 1)
                                            <a href="#{{short_description($submenu->nama,20)}}" data-toggle="collapse">{{short_description($submenu->nama,20)}}</a>
                                            @else
                                            <a href="{{category_url($submenu)}}" >{{short_description($submenu->nama,20)}}</a>
                                            @endif
                                        </div>
                                        @if($submenu->anak->count() != 0)
                                        <div id="{{short_description($submenu->nama,20)}}" class="accordion-body collapse in">
                                            <ul>
                                                @foreach($submenu->anak as $submenu2)
                                                @if($submenu2->parent == $submenu->id)
                                                <li><a href="{{category_url($submenu2)}}">{{short_description($submenu2->nama,20)}}</a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div><!-- /.accordion-body -->
                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div><!-- /.accordion-inner -->
                        </div>
                        @endif
                    </div><!-- /.accordion-group -->
                    @endif
                    @endforeach
                </div><!-- /.accordion -->
            </div><!-- /.category-accordions -->
            @endif
            <!-- ========================================= CATEGORY TREE : END ========================================= -->            
            <!-- ========================================= LINKS ========================================= -->
            @if(count(list_koleksi()) > 0)
            <div class="widget">
                <h1 class="border">Koleksi</h1>
                <div class="body">
                    <ul class="le-links">
                        @foreach (list_koleksi() as $kol)
                        <li><a href="{{koleksi_url($kol)}}">{{short_description($kol->nama,23)}}</a></li>
                        @endforeach
                    </ul><!-- /.le-links -->
                </div><!-- /.body -->
            </div><!-- /.widget -->
            @endif
            <!-- ========================================= LINKS : END ========================================= -->            
            @foreach(vertical_banner() as $banners)
            <div class="widget">
                <div class="simple-banner">
                    <a href="{{URL::to($banners->url)}}">{{HTML::image(banner_image_url($banners->gambar),'banner',array('width'=>'250','class'=>'img-responsive'))}}</a>
                </div>
            </div>
            @endforeach
            <!-- ========================================= FEATURED PRODUCTS ========================================= -->
            @if(count(best_seller()) > 0)
            <div class="widget">
                <h1 class="border">Best Seller</h1>
                <ul class="product-list">
                    @foreach(best_seller(5) as $bestproduk)
                    <li class="sidebar-product-list-item">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 no-margin">
                                <a href="{{product_url($bestproduk)}}" class="thumb-holder">
                                    <div class="side-image">
                                    {{HTML::image(product_image_url($bestproduk->gambar1,'thumb',array('width'=>'73')))}}
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <a href="{{product_url($bestproduk)}}">{{short_description($bestproduk->nama,38)}}</a>
                                <div class="price">
                                    @if(!empty($bestproduk->hargaCoret))
                                    <div class="price-prev">{{price($bestproduk->hargaCoret)}}</div>
                                    @endif
                                    <div class="price-current">{{price($bestproduk->hargaJual)}}</div>
                                </div>
                            </div>  
                        </div>
                    </li><!-- /.sidebar-product-list-item -->
                    @endforeach
                </ul><!-- /.product-list -->
            </div><!-- /.widget -->
            @endif
            <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar page-main-content">
            <h1 class="border">List Produk</h1>
                @if(count(list_product(null, @$category, @$collection)) > 0)
                <div class="tab-pane" id="featured">
                    <div class="product-grid-holder">
                        @foreach(list_product(null, @$category, @$collection) as $listproduk)
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                            <div class="product-item">
                                @if(is_outstok($listproduk))
                                    <div class="ribbon red"><span>kosong</span></div> 
                                @elseif(is_terlaris($listproduk))
                                    <div class="ribbon green"><span>Terlaris</span></div>
                                @elseif(is_produkbaru($listproduk))
                                    <div class="ribbon blue"><span>baru</span></div>
                                @endif
                                <div class="image">
                                    {{HTML::image(product_image_url($listproduk->gambar1,'medium'),$listproduk->nama,array('height'=>'186'))}}
                                </div>
                                <div class="body">
                                    <div class="label-discount green"><!-- -50% sale --></div>
                                    <div class="title" style="text-align: center;">
                                        <a href="{{product_url($listproduk)}}">{{short_description($listproduk->nama,39)}}</a>
                                    </div>
                                    <div class="brand"><!-- sony --></div>
                                </div>
                                <div class="prices">
                                    @if(!empty($listproduk->hargaCoret))
                                    <div class="price-prev">{{price($listproduk->hargaCoret)}}</div>
                                    <div class="price-current pull-right">{{price($listproduk->hargaJual)}}</div>
                                    @else
                                    <div class="price-current text-right">{{price($listproduk->hargaJual)}}</div>
                                    @endif
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="{{product_url($listproduk)}}" class="le-button">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </div>
                {{list_product(null, @$category, @$collection)->links()}} 
                @else
                <article class="text-center">
                    <i>Produk tidak ditemukan</i>
                </article>
                @endif
        </div><!-- /.page-main-content -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section>