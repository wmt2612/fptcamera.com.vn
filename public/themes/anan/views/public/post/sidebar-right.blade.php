            <div class="col-lg-{{ $col }} sidebar-blog d-md-none d-lg-block">
                <div class="sidebar">
                    <h4 class="title-sidebar title-sidebar-xemnhieu">Tin mới nhất</h4>
                    <div class="content-sidebar pt-15 pb-15">
                        @foreach($blogcategory_sidebar1 as $key=>$post)
                        <div class="row row-sidebar-product">
                            <div class="col-md-4">
                                <div class="img-product">
                                    <a href="{{ $post->url() }}">
                                        <img
                                            width="300"
                                            height="300"
                                            src="{{ $post->thumbnail() }}"
                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                            alt="{{ $post->name }}"
                                            loading="lazy"
                                            sizes="(max-width: 300px) 100vw, 300px"
                                        />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 pl-0">
                                <div class="title-product">
                                    <h4 class="nowrap-3">
                                        <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar mt-30">
                    <a href="#" style="color: white;">
                        <h4 class="title-sidebar title-sidebar-video">Video mới nhất</h4>
                    </a>
                    <div class="content-sidebar pt-15 pb-15 pvt">
                        @foreach($blogcategory_sidebar2 as $key=>$post)
                        <div class="row row-sidebar-product">
                            <div class="col-md-12">
                                <div class="box-video" style="position: relative;">
                                    <a href="{{ $post->url() }}">
                                        <i class="fa fa-play-circle-o fa-2x" aria-hidden="true" style="color: white; position: absolute; display: block; top: 70%; left: 12px;"></i>
                                        <img src="{{ $post->thumbnail() }}" />
                                    </a>
                                </div>
                                <div class="title-product post-video">
                                    <h4 class="nowrap-3">
                                        <a class="redirect-ytb" href="{{ $post->url() }}">{{ $post->name }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                         @endforeach

                    </div>
                </div>
                <!-- #region lap dat -->
                <div class="sidebar mt-30">
                    <h4 class="title-sidebar title-sidebar-congtrinh">Tin Tức</h4>
                    <div class="content-sidebar pt-15 pb-15">
                        @foreach($blogcategory_sidebar3 as $key=>$post)
                        <div class="row row-sidebar-product">
                            <div class="col-md-4">
                                <div class="img-product">
                                    <a href="{{ $post->url() }}">
                                        <img
                                            width="300"
                                            height="300"
                                            src="{{ $post->thumbnail() }}"
                                            class="attachment-thumbnail size-thumbnail wp-post-image"
                                            alt="{{ $post->name }}"
                                            loading="lazy"
                                            sizes="(max-width: 300px) 100vw, 300px"
                                        />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 pl-0">
                                <div class="title-product">
                                    <h4 class="nowrap-3"><a href="{{ $post->url() }}">{{ $post->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- #endregion lap dat -->
            </div>