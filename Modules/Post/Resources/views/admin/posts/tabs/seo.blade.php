<div id="options-group" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-0">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#seo" aria-expanded="true"
                        class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-name" class="pull-left">SEO</span>
                    </a>
                </h4>
            </div>

            <div id="seo" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                    @if ($post->slug ?? false)
                    {{ Form::text('slug', trans('page::attributes.slug'), $errors, $post, ['required' => true]) }}
                    @endif

                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            {{ trans('meta::attributes.meta_title') }}
                        </label>

                        <div class="col-md-9">
                            <input type="text" name="meta[meta_title]" class="form-control" id="meta-title"
                                value="{{ old("meta.meta_title", optional($post->meta ?? null)->translate(locale())->meta_title ?? '') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta-description" class="col-md-3 control-label text-left">
                            {{ trans('meta::attributes.meta_description') }}
                        </label>

                        <div class="col-md-9">
                            <textarea name="meta[meta_description]" class="form-control" id="meta-description" rows="10"
                                cols="10">{{ old("meta.meta_description", optional($post->meta ?? null)->translate(locale())->meta_description ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta-keyword" class="col-md-3 control-label text-left">
                            {{ trans('meta::attributes.meta_keyword') }}
                        </label>

                        <div class="col-md-9">
                            <input type="text" name="meta[meta_keyword]" class="form-control" id="meta-keyword"
                                value="{{ old("meta.meta_keyword", optional($post->meta ?? null)->translate(locale())->meta_keyword ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="options-group" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-0">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#criteria-0" href="#criteria-seo" aria-expanded="true" class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-name" class="pull-left">SEO criteria</span>
                    </a>
                </h4>
            </div>

            <div id="criteria-seo" class="panel-collapse collapse" aria-expanded="true" style="">
                <div class="panel-body">
                    <ul class="list-criteria-seo">
                        <li key="keywordInTitle" class="seo-check-keywordInHeadingContent">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Content containing keywords is located in heading tags(recommend h2, h3)</span>
                        </li>
                        <li key="keywordInTitle" class="seo-check-keywordInTitle">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Add Focus Keyword to the SEO title.</span>
                        </li>
                        <li key="keywordInMetaDescription" class="seo-check-keywordInMetaDescription">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Add Focus Keyword to your SEO Meta Description.</span>
                        </li>
                        <li key="keywordInPermalink" class="seo-check-keywordInPermalink">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Use Focus Keyword in the URL.</span>
                        </li>
                        <li key="keywordIn10Percent" class="seo-check-keywordIn10Percent">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Use Focus Keyword at the beginning of your content.</span>
                        </li>
                        <li key="keywordInContent" class="seo-check-keywordInContent">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Use Focus Keyword in the content.</span>
                        </li>
                        <li key="lengthContent" class="seo-check-lengthContent">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <span>Minimum recommended content length should be 600 words.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
