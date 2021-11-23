@extends('public.layout.app')
@section('title', 'Blood Donation | Volunteer')
@section('main')
        <div class="single" style="margin-top: 150px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center mb-4">
                    <h5>List of all volunteer</h5>
                    <div class="new-organisation">
                        <form action="/volunteer" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger pull-right">Filter</button>
                            <select class="form-control col-sm-3 mt-sm-10" id="areaFilter">
                                <option value="0">Area wise volunteer</option>

                                    <option value="115">Araihazar (আড়াইহাজার)</option>

                                    <option value="13">Badda (বাড্ডা)</option>

                                    <option value="594">Bahubal (বাহুবল)</option>

                                    <option value="128">Baliakandi (বালিয়াকান্দি)</option>

                                    <option value="420">Banaripara (বানারীপাড়া)</option>

                                    <option value="183">Bancharampur (বাঞ্ছারামপুর)</option>

                                    <option value="157">Banshkhali (বাঁশখালী)</option>

                                    <option value="427">Barguna Sadar (বরগুনা সদর)</option>

                                    <option value="415">Barisal (বরিশাল)</option>

                                    <option value="416">Barisal Sadar (বরিশাল সদর)</option>

                                    <option value="430">Betagi (বেতাগী)</option>

                                    <option value="67">Bhairab (ভৈরব)</option>

                                    <option value="88">Bhanga (ভাঙ্গা)</option>

                                    <option value="432">Bhola (ভোলা)</option>

                                    <option value="514">Bogra (বগুড়া)</option>

                                    <option value="515">Bogra Sadar (বগুড়া সদর)</option>

                                    <option value="217">Chakaria (চকরিয়া )</option>

                                    <option value="206">Chandpur (চাঁদপুর)</option>

                                    <option value="228">Chatkhil (চাটখিল)</option>

                                    <option value="195">Chauddagram (চৌদ্দগ্রাম)</option>

                                    <option value="236">Chhagalnaiya (ছাগলনাইয়া)</option>

                                    <option value="153">Chittagong (চট্টগ্রাম)</option>

                                    <option value="152">Chittagong District (চট্টগ্রাম জেলা)</option>

                                    <option value="189">Comilla (কুমিল্লা)</option>

                                    <option value="190">Comilla Sadar (কুমিল্লা সদর)</option>

                                    <option value="196">Comilla Sadar Dakshin (কুমিল্লা সদর দক্ষিণ)</option>

                                    <option value="226">Companiganj (কোম্পানীগঞ্জ)</option>

                                    <option value="216">Coxs Bazar Sadar (কক্সবাজার সদর)</option>

                                    <option value="237">Daganbhuiyan (দাগনভূঁইয়া)</option>

                                    <option value="10">Dhaka City (ঢাকা সিটি)</option>

                                    <option value="9">Dhaka District (ঢাকা জেলা)</option>

                                    <option value="234">Feni (ফেনী)</option>

                                    <option value="235">Feni Sadar (ফেনী সদর )</option>

                                    <option value="57">Gazipur (গাজীপুর)</option>

                                    <option value="58">Gazipur Sadar (গাজীপুর সদর)</option>

                                    <option value="374">Gobindaganj (গোবিন্দগঞ্জ)</option>

                                    <option value="95">Gopalganj (গোপালগঞ্জ)</option>

                                    <option value="165">Hathazari (হাটহাজারী)</option>

                                    <option value="27">Jatrabari (যাত্রাবাড়ী)</option>

                                    <option value="306">Jessore Sadar (যশোর সদর)</option>

                                    <option value="34">Khilkhet (খিলক্ষেত)</option>

                                    <option value="64">Kishoreganj Sadar (	কিশোরগঞ্জ সদর)</option>

                                    <option value="318">Kotchandpur (কোটচাঁদপুর)</option>

                                    <option value="605">Kulaura (কুলাউড়া)</option>

                                    <option value="72">Kuliarchar (কুলিয়ারচর)</option>

                                    <option value="251">Lakshmipur Sadar (লক্ষ্মীপুর সদর)</option>

                                    <option value="391">Lalmonirhat Sadar (লালমনিরহাট সদর)</option>

                                    <option value="168">Lohagara (লোহাগাড়া)</option>

                                    <option value="201">Manoharganj (মনোহরগঞ্জ)</option>

                                    <option value="634">Mirpur 12 (মিরপুর ১২)</option>

                                    <option value="452">Mirzaganj (মির্জাগঞ্জ)</option>

                                    <option value="149">Mirzapur (মির্জাপুর)</option>

                                    <option value="11">Mohammadpur (মোহাম্মদপুর)</option>

                                    <option value="99">Muksudpur (মুকসুদপুর)</option>

                                    <option value="470">Muktagachha (মুক্তাগাছা)</option>

                                    <option value="424">Muladi (মুলাদী)</option>

                                    <option value="106">Munshiganj (মুন্সিগঞ্জ)</option>

                                    <option value="462">Mymensingh Sadar (ময়মনসিংহ সদর)</option>

                                    <option value="113">Narayanganj (নারায়ণগঞ্জ)</option>

                                    <option value="114">Narayanganj Sadar (নারায়ণগঞ্জ সদর)</option>

                                    <option value="119">Narsingdi (নরসিংদি)</option>

                                    <option value="546">Natore Sadar (নাটোর সদর)</option>

                                    <option value="224">Noakhali (নোয়াখালি)</option>

                                    <option value="225">Noakhali Sadar (নোয়াখালি সদর)</option>

                                    <option value="123">Palash (পলাশ)</option>

                                    <option value="239">Parshuram (পরশুরাম)</option>

                                    <option value="255">Ramgati (রামগতি)</option>

                                    <option value="402">Saidpur (সৈয়দপুর)</option>

                                    <option value="231">Senbagh (সেনবাগ)</option>

                                    <option value="575">Shahjadpur (শাহজাদপুর)</option>

                                    <option value="313">Sharsha (শার্শা)</option>

                                    <option value="568">Sirajganj (সিরাজগঞ্জ)</option>

                                    <option value="178">Sitakunda  (সীতাকুণ্ড )</option>

                                    <option value="240">Sonagazi (সোনাগাজী)</option>

                                    <option value="232">Sonaimuri (সোনাইমুড়ি)</option>

                                    <option value="578">Sylhet (সিলেট)</option>

                                    <option value="579">Sylhet Sadar (সিলেট সদর)</option>

                                    <option value="223">Ukhia (উখিয়া)</option>

                                    <option value="577">Ullahpara (উল্লাপাড়া)</option>
                                </select>
                        </form>
                    </div>
                </div>
            </div>
             <div class="row">
                        <div class="col-sm-12">
                            <div class="single-wrapper">
                                <div class="box">
                                    <div class="row">
                                        <div class="col-sm-4">
                                                <div class="box-part text-center">
                                                    <h5 class="blood-group" style="padding: 4px;">
                                                        O-
                                                    </h5>
                                                    <div class="title">
                                                        <h5>Roven</h5>
                                                        <i class="fa fa-phone"></i><a href="#" title="নাম্বার দেখতে দয়া করে লগইন করুন">+88xxxxx577</a> <br>
                                                        <small>Place: Dhaka</small> <br>
                                                        <small>Last Donate: 11-11-2021</small> <br>
                                                        <span>Status:
                                                                 <span class="badge badge-warning">Available</span>
                                                                                                                </span>
                                                    </div>
                                                    <a style="width:100%" href="login.html" class="btn btn-outline-danger mt-2" onclick="return confirmInterested(1018)">Request for blood</a>
                                                </div>
                                            </div>
                                            <div class="pagination-wrapper">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection
