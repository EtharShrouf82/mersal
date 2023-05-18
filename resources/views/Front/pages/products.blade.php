@extends('Front.master.master')
@section('content')
    <header
        class="pages-header bg-cover"
        style="background-image: url({{ asset('/Front/assets/images/page-bg.png') }})"
    >
        <div class="container">
            <div class="inner-wrapper anim">
                <h1 class="h2">Services And Products</h1>
            </div>
        </div>
    </header>

    <section class="products-page">
        <div class="circle-shape top-start"></div>
        <div class="circle-shape bottom-start"></div>
        <div class="circle-shape end"></div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-lg-5">
                    <div class="products-filter anim">
                        <h5 class="title">Filter Products</h5>
                        <form>
                            <div class="search-input">
                                <input
                                    type="search"
                                    class="form-control"
                                    id="search"
                                    aria-describedby="search"
                                    placeholder="Search for Products..."
                                />
                                <button class="search-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="17.36"
                                        height="17.431"
                                        viewBox="0 0 17.36 17.431"
                                    >
                                        <g
                                            id="_16633429591571183082"
                                            data-name="16633429591571183082"
                                            transform="translate(0.5 0.5)"
                                        >
                                            <ellipse
                                                id="Ellipse_4"
                                                data-name="Ellipse 4"
                                                cx="6.2"
                                                cy="6.2"
                                                rx="6.2"
                                                ry="6.2"
                                                transform="translate(0 0)"
                                                fill="none"
                                                stroke="#299dee"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width="1"
                                            />
                                            <path
                                                id="Path_1137"
                                                data-name="Path 1137"
                                                d="M17.2,20.709l4.03,4.03a2.05,2.05,0,0,0,2.969,0h0a2.05,2.05,0,0,0,0-2.969L21.23,18.8"
                                                transform="translate(-8.475 -8.944)"
                                                fill="none"
                                                stroke="#299dee"
                                                stroke-linejoin="round"
                                                stroke-miterlimit="10"
                                                stroke-width="1"
                                            />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="categories-wrapper">
                                <h6>Categories</h6>
                                <ul>
                                    @foreach($productCats as $cat)
                                        <li>
                                            <label class="checkbox">{{ $cat->title }}
                                                <input type="checkbox" checked="checked"/>
                                                <span class="checkmark"></span>
                                            </label>
                                            <div class="category-number">{{ $cat->products_count }} Items</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sortby-select">
                                <select
                                    class="form-select"
                                    aria-label="Default select example"
                                >
                                    <option selected>Sort By</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="submit-wrapper">
                                <button type="submits" class="apply-filters-btn btn">
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="products-wrapper">
                        <div class="row gy-4">
                            @foreach($products as $product)
                                <div class="col-xl-4 col-sm-6 security mix anim">
                                    @include("Front.components.product")
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper">
                    <nav aria-label="Page navigation products pagination">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true"
                      ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10.182"
                              height="16.281"
                              viewBox="0 0 10.182 16.281"
                          >
                          <path
                              id="Path_294"
                              data-name="Path 294"
                              d="M1812.7,4362.342l-9.08,8.078,9.08,7.443"
                              transform="translate(-1802.846 -4361.968)"
                              fill="none"
                              stroke="#808495"
                              stroke-width="1"
                          />
                        </svg>
                      </span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link active" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true"
                      ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="10.186"
                              height="16.281"
                              viewBox="0 0 10.186 16.281"
                          >
                          <path
                              id="Path_294"
                              data-name="Path 294"
                              d="M1803.616,4362.342l9.084,8.078-9.084,7.443"
                              transform="translate(-1803.284 -4361.968)"
                              fill="none"
                              stroke="#808495"
                              stroke-width="1"
                          />
                        </svg>
                      </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
