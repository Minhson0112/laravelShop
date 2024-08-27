<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @stack('styles')
    <title>@yield('title', 'ホームページ')</title>
</head>
<body>
    @include('partials.header')

    <div id="app_contents">
        @include('partials.side_menu')

        <div id="app_contents_area">
            <p id="page_title">ホーム</p>
            <div class="shop_info">
                <div id="orders">
                    <div id="box_title">
                        <h4>注文数</h4>
                        <p>{{ $today }}</p>
                    </div>
                    <div id="box_content">
                        <h1>{{ $numberOfOrdersToday }}</h1>
                        <div>
                            <small>昨日と比較</small>
                            <small id="orderDifference">{{ $orderDifference }}</small>
                        </div>
                    </div>
                </div>

                <div id="money">
                    <div id="box_title">
                        <h4>本日の売上</h4>
                        <p>{{ $today }}</p>
                    </div>
                    <div id="box_content">
                        <h1 id="price_today">{{ $priceToday }} 円</h1>
                        <div>
                            <small>昨日と比較</small>
                            <small id="priceDifference">{{ $priceDifference }} 円</small>
                        </div>
                    </div>
                </div>
            </div>

            <form class="search_form">
                <label for="title_input">商品名:</label>
                <input type="text" id="title_input" name="title_input">
                <p id="title_input_error">商品名は200文字以内で入力してください</p>

                <label for="category_select">カテゴリ:</label>
                <select id="category_select" name="category_select">
                    <option value="" selected>カテゴリを選択してください</option>
                </select>
                <button id="search_button">検索</button>
                <p id="search_error">検索に失敗しました</p>
            </form>

            <table class="data_list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>カテゴリ</th>
                        <th>仕入れ価格</th>
                        <th>販売価格</th>
                        <th></th>
                        <th><button id="add_product_button"><img src="{{ asset('imgs/add.png') }}" alt="追加"></button></th>
                    </tr>
                </thead>
                <tbody id="data_list_items">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="edit_product_button"><img src="{{ asset('imgs/edit.png') }}" alt="編集"></button></td>
                        <td><button class="remove_product_button"><img src="{{ asset('imgs/remove.png') }}" alt="削除"></button></td>
                    </tr>
                </tbody>
            </table>

            <div id="add_product_dialog">
                <p id="add_product_dialog_title">商品を追加</p>
                <form id="add_form">
                    <label for="add_product_title_input">新しい商品名:</label>
                    <input type="text" name="add_product_title_input" id="add_product_title_input">
                    <p id="add_product_title_input_error">商品名は必須です</p>

                    <label for="add_product_category_select">カテゴリ:</label>
                    <select class="js-tags" id="add_product_category_select" name="add_product_category_select">
                        <option value="" selected>既存のカテゴリを選択</option>
                    </select>
                    <input type="text" id="input_category" placeholder="新しいカテゴリを入力">

                    <label for="input_entry_price">仕入れ価格 (円):</label>
                    <input type="number" name="input_entry_price" id="input_entry_price">

                    <label for="input_sell_price">販売価格 (円):</label>
                    <input type="number" name="input_sell_price" id="input_sell_price">

                    <div id="add_product_button_area">
                        <button id="close_add_product_button">キャンセル</button>
                        <button id="decide_add_product_button">追加</button>
                    </div>
                    <p id="add_product_error">追加に失敗しました</p>
                </form>
            </div>

            <div id="edit_product_dialog">
                <p id="edit_product_dialog_title">商品情報の編集</p>
                <form id="edit_form">
                    <label for="edit_product_title_input">商品名:</label>
                    <input type="text" name="edit_product_title_input" id="edit_product_title_input">
                    <p id="edit_product_title_input_error">商品名は必須です</p>

                    <label for="edit_product_category_select">カテゴリ:</label>
                    <select id="edit_product_category_select" name="edit_product_category_select">
                        <option value="" selected>既存のカテゴリを選択</option>
                    </select>
                    <input type="text" id="edit_category" placeholder="新しいカテゴリを入力">

                    <label for="edit_entry_price">仕入れ価格 (円):</label>
                    <input type="number" name="edit_entry_price" id="edit_entry_price">

                    <label for="edit_sell_price">販売価格 (円):</label>
                    <input type="number" name="edit_sell_price" id="edit_sell_price">

                    <div id="edit_product_button_area">
                        <button id="close_edit_product_button">キャンセル</button>
                        <button id="decide_edit_product_button">保存</button>
                    </div>
                    <p id="edit_product_error">保存に失敗しました</p>
                </form>
            </div>

            <div id="remove_product_dialog">
                <p id="remove_product_dialog_title">商品を削除</p>
                <form id="remove_form">
                    <p id="remove_dialog_msg"></p>
                    <div id="remove_product_button_area">
                        <button id="close_remove_product_button">キャンセル</button>
                        <button id="decide_remove_product_button">削除</button>
                    </div>
                    <p id="remove_product_error">削除に失敗しました</p>
                </form>
            </div>

        </div>
    </div>

    <div id="page_wrapper">
        <img id="loading_dialog" src="{{ asset('imgs/loading.gif') }}" alt="ロード中">
    </div>

    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="{{ asset('js/addProduct.js') }}"></script>
    <script src="{{ asset('js/getProductInfo.js') }}"></script>
    <script src="{{ asset('js/editProductInfo.js') }}"></script>
    <script src="{{ asset('js/removeProductInfo.js') }}"></script>
    <script src="{{ asset('js/homeDisplay.js') }}"></script>
</body>
</html>
