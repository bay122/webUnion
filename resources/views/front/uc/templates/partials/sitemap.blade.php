<section class="paperio-breadcrumb-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="text-extra-small text-uppercase alt-font paperio-breadcrumb-settings" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="{{ url('') }}" title="Ir a: Home" class="text-link-light-gray">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" class="text-link-light-gray" href="{{ url($category) }}" title="All News &amp; Magazine">
                            <span itemprop="name">{{$categoryName}}</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">{{$article}}</span>
                        <meta itemprop="position" content="3" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>