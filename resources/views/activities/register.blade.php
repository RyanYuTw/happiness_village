@extends('layouts/contentNavbarLayout')

@section('title', '線上報名表')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">活動說明</h5>
                <div class="card-body">
                    填表說明：
                    <ul>
                        <li>填表前，請先確認您欲團報的課程是否正確，如報錯課程，將採退報名的流程處理。</li>
                        <li>學員姓名：未免影響您的權益，請填寫<span class="fw-bold text-danger">「身分證上的姓名」</span></li>
                        <li>EMAIL：請以<span class="fw-bold text-danger">小寫輸入</span>，並勿輸入空格。(開課程影片權限用，學員需提供有效，並且收得到信件的google信箱，如提供錯誤，<span class="text-danger">造成後續需更改email帳號，將酌收費用，詳見報名簡章)</span></li>
                        <li>學校名稱：請填寫孩子就讀學校或就近可入班學校；<span class="fw-bold text-danger">務必依學校清單中的名稱進行填寫</span>→ <a href="https://reurl.cc/n5e7ge">https://reurl.cc/n5e7ge</a></li>
                        <li>欲報名之區域：填表前請先確認您學校團報欲報名參與之共學區域，如報錯，將採退報名的流程處理。</li>
                        <li>線上填寫完報名表送出後，學員會收到email通知。</li>
                        <li>請完成報名後保留您的<span class="fw-bold text-danger">查詢序號</span>，並匯款後回到報名頁面「<span class="fw-bold text-danger">回傳繳款訊息</span>」超過期限未回報繳款訊息者，恕協會無法對帳，將視為「未完成報名」，進入退報流程；<span class="fw-bold text-danger">最晚回報日：2024/10/3 中午12:00止</span></li>
                        <li><span style="font-weight:bold;">學員/報名窗口可於報名表中→「目前報名人數」→「承辦人員註記」呈現對帳進度。協會最慢2天會一次帳。(不含例假日)</span></li>
                    </ul>
                    <h3><a href="https://www.happinessvillage.org/join/lesson">詳見芯福里協會官網-課程簡章說明！！</a></h3>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <h5 class="card-header">三年級：好人氣養成班報名表(113上學期) </h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('activities.register') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-6">
                            <label class="form-label" for="name"><span class="text-danger">※</span> 學員姓名(請填寫「身分證上的姓名」)：</label>
                            <input type="text" class="form-control" name="name" placeholder="例:王小明" required>
                            <div class="invalid-feedback"> 請輸入您身分證上的姓名 </div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="tel">市話：</label>
                            <div class="input-group">
                                <label for="html5-tel-input" class="col-md-2 input-group-text">號碼：</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="tel" placeholder="區碼-電話號碼, 例:02-1234567" name="tel" />
                                </div>
                                <label for="html5-tel-branch-input" class="col-md-2 input-group-text">分機：</label>
                                <div class="col-md-2">
                                    <input class="form-control" type="tel" placeholder="有分機才填, 例:1234" name="tel-branch"/>
                                </div>
                                <div class="invalid-feedback"> 請輸入正確的市話號碼 </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="mobile"><span class="text-danger">※</span> 行動電話：</label>
                            <input type="text" class="form-control" name="mobile" placeholder="10碼數字, 例: 0123456789" required />
                            <div class="invalid-feedback"> 請輸入正確的行動電話號碼 </div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="email"><span class="text-danger">※</span> EMAIL(google帳號)用小寫填入：</label>
                            <input type="email" name="email" class="form-control" placeholder="小寫 google帳號, 例: abcdef@gmail.com" aria-label="email" required>
                            <div class="invalid-feedback"> 請輸入正確的電子郵件信箱 </div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="line-id">LINE ID：</label>
                            <input type="email" name="line-id" class="form-control" placeholder="LINE ID" aria-label="line id">
                            <div class="invalid-feedback"> 請輸入 LINE ID </div>
                        </div>
                        <div class="mb-6">
                            <label class="form-label"><span class="text-danger">※</span> 我同意並遵守相關規則：</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    1.我了解加入芯福里情緒教育協會SEL志工，培訓流程包括：基本理論課、教案示範課、教案共學課、入班前備課。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    2.我了解學習社會情緒教育，參與備課、入班是實踐學習、利己利他的服務。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="3" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    3.我了解保證金是鼓勵入班服務，需完成下列各項條件後，由當事人於規定之時間主動提出申請退費，條件：(以下內容以當期簡章所述為正確)3.1報名一種課程，即需完成影片觀課達100%✚教案共學課4次課程全程參與。3-2.報名一種課程，即需完成服務時數12小時，可退費1500元。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="4" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    4.我了解入班服務有分主講、課程協助；時數申報方式需按協會行政表格格式及規定提供資料。(時數回報以校為單位，由學校窗口統一填表回報)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="5" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    5.我了解本課程使用教案與教具皆有版權，僅供推廣學校公益課程使用，其餘均需事先書面取得協會同意。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="6" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    6.我同意芯福里督導觀課、指導並一同討論我入班服務的狀況，以維護上課品質。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="7" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    7.我已完整了解並接受官網本期志工培訓簡章所述內容。
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="8" name="rules[]" required>
                                <label class="form-check-label" for="rules">
                                    8.我已完整了解並接受官網公告志工守則。
                                </label>
                            </div>
                            <label class="form-label"><span class="text-danger">至少勾選8項</span></label>
                        </div>
                        <div class="mb-6">
                            <label for="city" class="form-label"><span class="text-danger">※</span> 學校縣市：</label>
                            <label class="form-label"><span class="text-danger">孩子就讀的學校(或您所在地)地址在哪一縣市</span></label>
                            <select class="form-select" id="city" name="city" aria-label="Default select" required>
                                @if (!empty($cities))
                                    <option selected disabled value="">請選擇</option>
                                    @foreach ($cities as $code => $city)
                                        <option value="{{ $code }}">{{ $city }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <div class="invalid-feedback"> 請選擇學校縣市 </div>
                        </div>
                        <div class="mb-6">
                            <label for="county" class="form-label"><span class="text-danger">※</span> 學校鄉鎮區：</label>
                            <label class="form-label"><span class="text-danger">孩子就讀的學校(或您所在地)地址在哪一鄉鎮區</span></label>
                            <select class="form-select" id="county" name="county" aria-label="Default select" required>
                                <option selected disabled value="">請選擇</option>
                            </select>
                            <div class="invalid-feedback"> 請填寫學校鄉鎮區 </div>
                        </div>
                        <div class="mb-6">
                            <label for="school" class="form-label"><span class="text-danger">※</span> 學校名稱(縣/市/私立校名)：</label>
                            <label class="form-label"><span class="text-danger">孩子就讀學校或就近可入班學校</span></label>
                            <input type="text" class="form-control" name="school" placeholder="例:縣立十興國小" required />
                            <label class="form-label"><span class="text-danger">務必依學校清單中的名稱進行填寫－<a href="https://reurl.cc/n5e7ge">https://reurl.cc/n5e7ge</a></span></label>
                            <div class="invalid-feedback"> 請依學校清單中的名稱進行填寫 </div>
                        </div>
                        <div class="mb-6">
                            <label for="area" class="form-label"><span class="text-danger">※</span> 報名區域：</label>
                            <label class="form-label"><span class="text-danger">請選取欲報名之區域(參與共學之區域)；如報錯，將採退報名的流程處理。</span></label>
                            <select class="form-select" name="area" aria-label="Area select" required>
                                <option selected disabled value="">請選擇</option>
                                <option value="1">西區</option>
                                <option value="2">南區</option>
                                <option value="3">新北市</option>
                                <option value="4">中區</option>
                                <option value="5">桃園</option>
                            </select>
                            <div class="invalid-feedback"> 請選取欲報名之區域 </div>
                        </div>
                        <div class="mb-6">
                            <label for="agent-info" class="form-label"><span class="text-danger">※</span> 報名窗口-姓名/手機：</label>
                            <input type="text" class="form-control" name="agent-info" placeholder="例: 0123456789" required />
                            <div class="invalid-feedback"> 請填入報名窗口-姓名/手機 </div>
                        </div>
                        <div class="mb-6">
                            <label for="agent-email" class="form-label"><span class="text-danger">※</span> 報名窗口Email：</label>
                            <input type="text" class="form-control" name="agent-email" placeholder="例: abcdef@gmail.com" required />
                            <div class="invalid-feedback"> 請填入報名窗口Email </div>
                        </div>
                        <div class="divider">
                            <div class="divider-text">
                                請再次確認以上資料是否填寫無誤
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/js/form-validate.js') }}"></script>
    <script src="{{ asset('assets/js/checkbox-radio.js') }}"></script>
    <script src="{{ asset('assets/js/city-county-selector.js') }}"></script>
@endsection
