
        <div class = "w-64 ">
            <nav id="sidebarMenu" class="mt-4 d-md-block bg-light sidebar collapse">
                <div class="pt-3 sidebar-sticky ">
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="text-black nav-link active text-capitalize" href="/dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="text-black nav-link text-capitalize"  data-toggle="collapse" href="#orders">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                Orders & reservations
                            </a>
                            <div class="collapse col-12" id="orders">
                               <div class="py-2 col-12">
                                    <a href="/orders/viewallOrders/transactions" class="text-black text-capitalize">view all orders</a>
                               </div>
                               <div class="py-2 col-12">
                                    <a href="/orders/viewallOrders/active" class="text-black text-capitalize">active orders</a>
                               </div>
                                <div class="py-2 col-12">
                                    <a href="/orders/viewallOrders/deliver" class="text-black text-capitalize">to deliver orders</a>
                                </div>
                                <div class="py-2 col-12">
                                    <a href="/orders/viewallOrders/done" class="text-black text-capitalize">done orders</a>
                               </div>
                               <div class="py-2 col-12">
                                <a href="/reservations" class="text-black text-capitalize">service reservations</a>
                           </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="text-black nav-link text-capitalize" data-toggle="collapse" href="#products">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                Products
                            </a>
                            <div class="collapse col-12" id="products">
                               <div class="py-2 col-12">
                                    <a href="/product/all" class="text-black text-capitalize">view all products</a>
                               </div>
                               <div class="py-2 col-12">
                                    <a href="/product/create" class="text-black text-capitalize">create product</a>
                               </div>
                                <div class="py-2 col-12">
                                    <a href="/product/pending" class="text-black text-capitalize">pending</a>
                               </div>
                                <div class="py-2 col-12">
                                    <a href="/product/publish" class="text-black text-capitalize">publish</a>
                               </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="text-black nav-link text-capitalize" data-toggle="collapse" href="#customers">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                Customers
                            </a>
                            <div class="collapse col-12" id="customers">
                               <div class="py-2 col-12">
                                    <a href="/customer-all" class="text-black text-capitalize">view all customer</a>
                               </div>
                               <div class="py-2 col-12">
                                    <a href="/customer-all/verified" class="text-black text-capitalize">verified</a>
                               </div>
                                <div class="py-2 col-12">
                                    <a href="/customer-all/not-verified" class="text-black text-capitalize">not verified</a>
                               </div>
                                <div class="py-2 col-12">
                                    <a href="/customer-all/inquiries" class="text-black text-capitalize">inquiries</a>
                               </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="text-black nav-link text-capitalize" data-toggle="collapse" href="#loanApplicants">
                                <svg width="24" height="24"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                  </svg>
                                Loan Applicants
                            </a>
                            <div class="collapse col-12" id="loanApplicants">
                               <div class="py-2 col-12">
                                    <a href="/loan/applicants" class="text-black text-capitalize">view all applicants</a>
                               </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
