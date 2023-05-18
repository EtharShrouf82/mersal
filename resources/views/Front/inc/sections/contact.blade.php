<section id="contact-us" class="contact">
    <div class="circle-shape"></div>
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-6 order-2 order-lg-1 anim">
                <div class="contact-map image-placeholder">
                    <iframe
                        width="100%"
                        height="100%"
                        src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=mount%20nebo+(Title)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed"
                        frameborder="0"
                        scrolling="no"
                        marginheight="0"
                        marginwidth="0"
                    ></iframe>
                    <style>
                        #gmap_canvas img {
                            max-width: none !important;
                            background: none !important;
                        }
                    </style>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 anim">
                <div class="contact-form-wrapper">
                    <h2>Contact Us</h2>
                    <div class="contact-form">
                        <form>
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label"
                                        >Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control input"
                                            id="name"
                                            aria-describedby="firstName"
                                        />
{{--                                        <div id="firstNameValidation" class="invalid-feedback">--}}
{{--                                            this field is mandatory--}}
{{--                                        </div>--}}
                                    </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input
                                    type="email"
                                    class="form-control input"
                                    id="email"
                                    aria-describedby="emailHelp"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea" class="form-label"
                                >Message</label
                                >
                                <textarea
                                    class="form-control input"
                                    id="message"
                                    placeholder=""
                                    required
                                    rows="4"
                                ></textarea>
                                <input type="hidden" id="inputHidden">
                            </div>

                            <button id="sendMsg" class="btn primary-btn">
                                <span>lets chat</span>
                            </button>
                            <div class="spinner-border text-danger hidden" id="contact_spinner" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="ok alert hidden">شكراً لكم، تم إرسال الرسالة بنجاح.</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
