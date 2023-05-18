<section class="pricing-plans">
    <div class="container">
        <h2 class="anim">
            <span class="text-black position-relative">
              Pricing
              <div class="maraseel-shape">
                <img
                    class="img-fluid"
                    src="{{ asset('/Front/assets/images/maraseel-shape.png') }}"
                    alt="maraseel"
                /></div
              ></span>
        </h2>
        <div class="pricing-cards-wrap">
            <div class="row gy-4">
                @foreach($screenTypes as $type)
                    <div class="col-xl-4 col-lg-6">
                        <div class="pricing-card anim">
                            <div class="pricing-card-head">
                                <h4>{{ $type->title }}</h4>
                            </div>
                            <div class="pricing-card-body">
                                <h4>Plans</h4>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach(App\Models\Plan::where('screen_type_id',$type->id)->where('status',1)->get() as $plan)
                                        <li class="nav-item" role="presentation">
                                            <button
                                                class="nav-link @if($loop->first) active @endif "
                                                id="plana-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#plana{{ $type->id }}{{ $plan->id }}"
                                                type="button"
                                                role="tab"
                                                aria-controls="plana"
                                                aria-selected="true"
                                            >
                                                {{ $plan->title }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="plans">
                                    @foreach(App\Models\Plan::where('screen_type_id',$type->id)->where('status',1)->get() as $plan)
                                        <div
                                            class="tab-pane fade show @if($loop->first) active @endif"
                                            id="plana{{ $type->id }}{{ $plan->id }}"
                                            role="tabpanel"
                                            aria-labelledby="plana-tab">
                                            <div class="pricing-table">
                                                <div class="header-label">
                                                    <h5><span>{{ $plan->num_views }}</span> Appearances Per Day</h5>
                                                </div>
                                                <table>
                                                    <tr class="head">
                                                        <th>Price</th>
                                                        <th>Period</th>
                                                        <th>Discount</th>
                                                        <th>New Price</th>
                                                    </tr>
                                                    @foreach(App\Models\ScreenPrice::where('screen_type_id',$type->id)->where('plan_id',$plan->id)->where('status',1)->get()  as $price)
                                                        <tr>
                                                            <td>${{ $price->price }}</td>
                                                            <td>{{ $price->title }}</td>
                                                            <td>%{{ $price->discount }}</td>
                                                            <td>${{ $price->getPriceAfterDiscount() }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="subscribe-wrap">
                                                <button class="subscribe-btn">
                                                    <span>Subscripe Now</span>
                                                    <span
                                                    ><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="5.914"
                                                            height="9.828"
                                                            viewBox="0 0 5.914 9.828"
                                                        >
                                <path
                                    id="Icon_feather-chevron-down"
                                    data-name="Icon feather-chevron-down"
                                    d="M0,3.5,3.5,0,7,3.5"
                                    transform="translate(4.914 1.414) rotate(90)"
                                    fill="none"
                                    stroke="#fff"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                />
                              </svg>
                            </span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
