<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
	<script type="text/javascript"
		src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=vtDXuvp7xNuxuGhcx5_2NKWTCBS1Eprtd96i9MScGVK439yEyaYDeJj1ngNqdBCon3zCCzze_OMXZvLng95QK-CeedyZZ9z5zARXoMihd5y8Fr1F72jPN09U-6MaxFQhWRb2R5bXeMyIFTByYUJlQ3Iuvx3lxpD9aix3USNCRgJ4pOERBZZ7_zaWcSI0nzZjC-a1ZbML1WkHnLaa1YshvQ"
		charset="UTF-8"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
	.dnone {
		display: none;
	}

	.bxst-prices-table .bxst-prices-table-sidebar {
		margin-right: 20px;
		background-color: #fff;
	}

	@media (max-width: 991px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__columns {
			flex-wrap: wrap;
			justify-content: center;
		}
	}

	.header-category-menu-list__slide {
		cursor: pointer;
	}

	.tab {
		/* padding-top: 0 !important; */
		padding-bottom: 7px;
	}

	.bxst-prices-table .bxst-prices-table-row-border .bxst-prices-table-body {
		background-color: white;
	}

	.bx-sb-b24-price-table-price__discount-value,
	.bx-sb-b24-price-table-user__message,
	.bx-sb-b24-price-table-supply__message,
	.bx-sb-b24-price-table-price__epilogue,
	.bx-sb-b24-price-table-price__value,
	.bx-sb-b24-price-table-price__base,
	.bx-sb-b24-price-table-user__value.bx-sb-b24-price-table-user__value_select,
	.bx-sb-b24-price-table-user__value.bx-sb-b24-price-table-user__value_select,
	.bx-sb-b24-price-table-header__description,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
		color: white;
	}

	.btn4 {
		background-color: white;
		display: flex;
		align-items: center;
		justify-content: flex-start;
		column-gap: var(--gap);
		padding: 0.2rem 1rem;
		cursor: pointer;
		border-radius: var(--radius);
		border: 2px solid transparent;
		;
		box-shadow: var(--shadow);
		background-color: rgba(0, 208, 212, 0);
		margin: 0 auto;
	}

	.bx {
		font-size: 1.1rem;
	}

	.container {
		position: relative;
	}

	.dropdown4 {
		position: absolute;
		margin-left: auto;
		margin-right: auto;
		left: 0;
		right: 0;
		text-align: center;
		top: 58px;
		width: 200px;
		height: 90px;
		z-index: 999;
		box-shadow: var(--shadow);
		border: 2px solid #a6c7cc;
		;
		border-radius: 9px;
		margin-top: 0.3rem;
		background-color: rgb(182, 234, 235);
		visibility: hidden;
		opacity: 0;
		transform: translateY(0.5rem);
		transition: all 0.1s cubic-bezier(0.16, 1, 0.5, 1);
		cursor: pointer;
	}

	.dropdown4 ul {
		padding-left: 0;
	}

	.dropdown4 li {
		display: flex;
		align-items: center;
		justify-content: center;
		column-gap: var(--gap);
		padding: 0.8rem 1.3rem;
		text-decoration: none;
		color: black;
	}

	.dropdown4 li:hover {
		background-color: var(--color);
		color: black;
	}

	.show4 {
		visibility: visible;
		opacity: 1;
		transform: translateY(0rem);
	}

	.arrow4 {
		transform: rotate(180deg);
		transition: 0.2s ease;
	}

	/* Main Script End */



	/* Start header-content-area */


	.header-content-area {
		display: flex;
		justify-content: center;
		box-sizing: border-box;
		background-color: rgb(4, 91, 160);
	}

	.header-content-area__outer {
		display: flex;
		flex: 0 0 100%;
		max-width: 1180px;
		padding: 41px 15px 47px;
	}

	.header-content-area .header-content-area-content__title {
		margin: auto;
		color: #fff;
		font-size: 3rem;
		font-weight: 400;
		line-height: 1;
	}

	.header-category-menu .header-category-menu-item.active {
		background: #fff;
	}

	.header-category-menu-list__slide {
		background-color: rgb(4, 91, 160);
	}

	/* End header-content-area */



	/* Start:/local/components/sb/price.table.bitrix24/templates/default.prices.table.v4/style.min.css?167180160183250*/

	.bxst-prices-table .bxst-prices-table-sidebar {
		justify-content: center;
		text-align: center;
	}

	.bxst-prices-table .bxst-prices-table-sidebar-column-item {
		margin: 20px 5px 0px 0 !important;
	}

	.bxst-prices-table-item {
		padding-top: 20px;
		padding-bottom: 20px;
	}

	.bx-ui-button {
		display: inline-block;
		position: relative;
		padding: 0.5rem 1.25rem;
		border: none;
		border-radius: 30px;
		background-color: #bdf300;
		;
		color: #262626;
		font-family: inherit;
		font-size: .875rem;
		font-weight: 400;
		font-style: inherit;
		line-height: 1.5;
		text-align: center;
		text-transform: uppercase;
		text-decoration: none;
		box-sizing: border-box;
		outline: none;
		vertical-align: middle;
		cursor: pointer;
	}

	.bx-ui-button.bx-ui-button_success_dark {
		background-color: #bdf300;
		color: #262626;
		font-weight: 700;
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns {
		display: flex;
		max-width: 100%;
		flex: 1 0 auto
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
		padding: 5px;
		border: 2px solid transparent;
		border-radius: 24px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column_border {
		border-color: #1ec6fa
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
		max-width: 420px;
		width: 100%;
		margin-bottom: 15px;
		margin-left: 0;
		margin-right: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column_col {
		display: flex;
		flex-direction: column
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__row .bx-sb-b24-price-table__columns,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__row .bx-sb-b24-price-table__column {
		height: auto
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column_round_top {
		border-top-left-radius: 18px;
		border-top-right-radius: 18px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__row:last-child:not(.bx-sb-b24-price-table__features_header) .bx-sb-b24-price-table__column {
		border-bottom-left-radius: 18px;
		border-bottom-right-radius: 18px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
		border-radius: 18px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table__background {
		display: flex;
		flex-direction: column;
		height: 100%;
		background-color: rgba(255, 255, 255, 0.05);
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column .bx-sb-b24-price-table__background {
		border-radius: 18px
	}


	.bx-sb-b24-price-table .bx-sb-b24-price-table__select {
		width: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__header,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__user,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__price,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__order,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__storage {
		padding-left: 15px;
		padding-right: 15px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__supply {
		padding-left: 8px;
		padding-right: 8px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__header {
		width: 100%;
		margin-bottom: 15px;
		padding-top: 25px;
		padding-bottom: 17px;
		background-color: rgba(0, 0, 0, 0.15);
		border-radius: 18px 18px 3px 3px
	}






	.bx-sb-b24-price-table .bx-sb-b24-price-table-wobblers .bx-sb-b24-price-table-wobblers__label {
		font-size: 12px;
		opacity: .67
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-wobblers .bx-sb-b24-price-table-wobblers__message {
		font-size: 16px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table__header {
		background-color: rgba(0, 0, 0, 0.15);
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_aquamarine .bx-sb-b24-price-table__header {
		background-color: rgba(0, 0, 0, 0.15);
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__user {
		padding-top: 8px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__price {
		padding-top: 12px;
		padding-bottom: 5px
	}



	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-price__message,
	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-price__value {
		color: #7c9b00
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__order {
		padding-top: 22px;
		padding-bottom: 15px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__storage {
		padding-top: 10px;
		padding-bottom: 20px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
		font-size: 17px !important;
	}



	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message_icon-0:after {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjk5NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDBhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMSAwIDAtMTJINnptMCAxYTUgNSAwIDEgMCAwIDEwaDE3YTUgNSAwIDEgMCAwLTEwSDZ6IiBmaWxsPSIjNzlCRUQ0Ii8+PC9zdmc+")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message_icon-1:after {
		background-image: url("/assets/images/after-red.svg")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message_icon-2:after {
		background-image: url("/assets/images/after-yellow.svg")
	}

	.bxst-prices-table-users-value,
	.bxst-prices-table-body .bxst-prices-table-price,
	.bxst-prices-table-body .bxst-prices-table-users-count,
	.bxst-prices-table-price__message,
	.bxst-prices-table .bxst-prices-table-title {
		color: white;

	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message_icon-3:after {
		background-image: url("/assets/images/after-green.svg")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table__supply:before {
		background-color: rgba(178, 200, 91, 0.22)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message_icon-0:after {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDBhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMSAwIDAtMTJINnptMCAxYTUgNSAwIDEgMCAwIDEwaDE3YTUgNSAwIDEgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PC9zdmc+")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message_icon-1:after {
		background-image: url("/assets/after-red.svg")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message_icon-2:after {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PHBhdGggb3BhY2l0eT0iLjkiIGQ9Ik0zIDdhMyAzIDAgMCAxIDMtM2gyLjk0YS4wNi4wNiAwIDAgMSAuMDYuMDZ2NS44OGEuMDYuMDYgMCAwIDEtLjA2LjA2SDZhMyAzIDAgMCAxLTMtM3oiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjxyZWN0IG9wYWNpdHk9Ii45IiB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjwvc3ZnPg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message_icon-3:after {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PHBhdGggb3BhY2l0eT0iLjkiIGQ9Ik0zIDdhMyAzIDAgMCAxIDMtM2gyLjk0YS4wNi4wNiAwIDAgMSAuMDYuMDZ2NS44OGEuMDYuMDYgMCAwIDEtLjA2LjA2SDZhMyAzIDAgMCAxLTMtM3pNMjYgN2EzIDMgMCAwIDEtMyAzaC0zLjkzYS4wNy4wNyAwIDAgMS0uMDctLjA3VjQuMDdhLjA3LjA3IDAgMCAxIC4wNy0uMDdIMjNhMyAzIDAgMCAxIDMgM3oiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjxyZWN0IG9wYWNpdHk9Ii45IiB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjwvc3ZnPg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__container[data-sb-hover]:hover .bx-sb-b24-price-table-supply__message:not(.bx-sb-b24-price-table-supply__message_empty),
	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message[data-sb-hover]:hover:not(.bx-sb-b24-price-table-supply__message_empty),
	.bx-sb-b24-price-table .bx-sb-b24-price-table__column .bx-sb-b24-price-table-supply__message_tooltip:hover:not(.bx-sb-b24-price-table-supply__message_empty) {
		background-color: rgba(33, 189, 238, 0.2)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__container[data-sb-hover]:hover .bx-sb-b24-price-table-supply__message:not(.bx-sb-b24-price-table-supply__message_empty),
	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message[data-sb-hover]:hover:not(.bx-sb-b24-price-table-supply__message_empty),
	.bx-sb-b24-price-table .bx-sb-b24-price-table__column.bx-sb-b24-price-table__column_green .bx-sb-b24-price-table-supply__message_tooltip:hover:not(.bx-sb-b24-price-table-supply__message_empty) {
		background-color: rgba(163, 205, 0, 0.2)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__prologue {
		margin-bottom: 20px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-prologue {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-direction: column;
		padding: 0 10px
	}



	.bx-sb-b24-price-table .bx-sb-b24-price-table-header {
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
		font-weight: 600;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title.bx-sb-b24-price-table-header__title_sup {
		position: relative;
		top: -6px;
		font-size: 10px;
		line-height: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title.bx-sb-b24-price-table-header__title_md {
		font-size: 16px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__row.bx-sb-b24-price-table__features .bx-sb-b24-price-table-header__title {
		font-size: 14px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__row.bx-sb-b24-price-table__features_header {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__description {
		min-height: 40px;
		max-width: 290px;
		margin-top: 12px;
		margin-left: auto;
		margin-right: auto;
		font-size: 10px;
		font-weight: 600;
		line-height: 1.2;
		opacity: .4
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user {
		min-height: 60px;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__content {
		display: flex;
		align-items: center;
		justify-content: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__container.bx-sb-b24-price-table-user__container_bottom {
		padding-bottom: 16px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__icon {
		display: block;
		background-position: 50% 50%;
		background-size: contain;
		background-repeat: no-repeat
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__icon_fire {
		width: 17px;
		height: 22px;
		margin: 5px -4px 0 -21px;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTEiIGhlaWdodD0iMTQiIHZpZXdCb3g9IjAgMCAxMSAxNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik04LjI1IDEwLjVDOC4yNSA4LjU3NSA2Ljg1NjY3IDguODc5NSA1LjUgNi4xMjVDMy44OTY1MSA3LjA3MzQzIDIuODcyMTIgOC43MDMxNSAyLjc1IDEwLjVDMi44MzgzIDExLjg1NTggMy41MDAwNCAxMy4xMTkxIDQuNTgzMzMgMTRIMy45MzI1QzEuNjE0NzUgMTMuMTg5MiAwLjA1NDExOCAxMS4xMDU3IDAgOC43NUMwIDQuNzc3NSA0LjExNTgzIDEuMDYxMzggNi40MTY2NyAwQzUuOTc2NjcgMy42NjcxMiAxMSA0LjYyNjEyIDExIDkuNDA2MjVDMTEgMTIuNzk4NiA3LjA2NzUgMTQgNy4wNjc1IDE0SDYuNDE2NjdDNy41Njg1MSAxMy4xNzIgOC4yNDcxMyAxMS44NzY0IDguMjUgMTAuNVoiIGZpbGw9IiNGOTMwMDAiLz4KPC9zdmc+Cg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__icon_fire_unlimited {
		margin-top: 11px;
		margin-right: 4px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__message {
		font-size: 14px;
		font-weight: 600;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__message.bx-sb-b24-price-table-user__message_unlimited {
		padding-top: 16px;
		font-size: 16px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__value {
		padding-top: 4px;
		padding-bottom: 12px;
		font-size: 24px;
		font-weight: 600;
		line-height: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__value.bx-sb-b24-price-table-user__value_select {
		padding: 6px;
		border: 2px solid transparent;
		border-radius: 30px;
		line-height: .7
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__value.bx-sb-b24-price-table-user__value_select_pointer {
		font-size: 16px;
		line-height: 1;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__value.bx-sb-b24-price-table-user__value_select[data-sb-active] {
		border-color: #21bdee;
		cursor: default
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__epilogue {
		position: relative;
		top: 8px;
		line-height: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__more {
		display: inline-block;
		padding-bottom: 6px;
		border-bottom: 1px dashed;
		color: #fff;
		font-size: 8px;
		font-weight: 500;
		line-height: 0;
		text-decoration: none;
		opacity: .4;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__more:hover {
		color: #262626
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-user__select {
		display: flex;
		justify-content: center;
		flex-wrap: wrap
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price {
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price.bx-sb-b24-price-table-price_description {
		min-height: 55px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__content {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__content.bx-sb-b24-price-table-price__content_selected,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__content[data-sb-selected] {
		display: block
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__message,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__base,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__value,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__discount {
		position: relative;
		font-weight: 600
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__base {
		bottom: 7px;
		font-size: 12px;
		line-height: 0;
		text-decoration: line-through;
		opacity: .4
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__current {
		display: flex;
		align-items: center;
		justify-content: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__value {
		min-height: 26px;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__message,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__value span {
		font-size: 21px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__value span {
		margin-right: 3px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__discount {
		display: inline-block;
		margin-left: 2px;
		padding: 12px 8px;
		background-color: rgba(207, 247, 50, 0.7);
		border-radius: 3px;
		font-size: 14px;
		font-weight: 700;
		line-height: 0;
		transform: skewX(-10deg)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__discount-value {
		transform: skewX(10deg)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__discount_sale {
		background-color: rgba(255, 215, 23, 0.7)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__epilogue {
		position: relative;
		display: inline-flex;
		justify-content: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__epilogue .bx-sb-b24-price-table-tooltip.bx-sb-b24-price-table-tooltip_title {
		min-width: 150px;
		padding: 8px 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__epilogue .bx-sb-b24-price-table-tooltip.bx-sb-b24-price-table-tooltip__content {
		text-align: left
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__description {
		display: inline-block;
		margin-top: 15px;
		padding-bottom: 6px;
		font-size: 12px;
		font-weight: 600;
		line-height: 0;
		opacity: .4
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__description_link {
		border-bottom: 1px dashed #0050af;
		color: #0050af;
		text-decoration: none;
		opacity: .8
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-price__description_link:hover {
		color: #0050af;
		text-decoration: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order {
		min-height: 36px;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__content[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button {
		position: relative;
		display: inline-block;
		min-width: 152px;
		margin: auto;
		padding: 12px;
		border: none;
		border-radius: 18px;
		box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.07);
		font-size: 12px;
		font-weight: 700;
		line-height: 1;
		text-align: center;
		text-transform: uppercase;
		text-decoration: none;
		outline: none;
		vertical-align: middle;
		cursor: pointer;
		transition: all 0.2s ease-in-out
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button {
		background-color: #e31e24
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button.bx-sb-b24-price-table-order__button_green {
		background-color: #a3cd00
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button:hover {
		color: #fff
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button:hover {
		opacity: .7
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button[disabled],
	.bx-sb-b24-price-table .bx-sb-b24-price-table-order__button:hover[disabled] {
		opacity: .5;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-storage {
		min-height: 18px;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-storage__value {
		color: white;
		font-size: 17px;
		font-weight: 700;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-storage__content[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply {
		display: flex;
		justify-content: center;
		height: 100%;
		padding-top: 17px;
		padding-bottom: 25px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__inner {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-direction: column;
		max-width: 100%;
		width: 100%;
		height: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__section {
		width: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__section[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__section:first-child {
		margin-bottom: 15px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list {
		display: flex;
		align-items: flex-start;
		flex-direction: column
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__list {
		width: calc(100% - 23px);
		margin-left: 19px;
		margin-bottom: 10px;
		padding-left: 4px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message {
		position: relative;
		display: inline-block;
		max-width: 100%;
		min-height: 31px;
		padding: 8px 17px;
		border-radius: 18px;
		font-weight: 600;
		line-height: 1;
		white-space: nowrap;
		text-overflow: ellipsis;
		transition: all 0.2s ease-in-out;
		overflow: hidden
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message_empty {
		display: none;
		min-height: 35px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message:after {
		content: '';
		position: absolute;
		display: inline-block;
		width: 31px;
		height: 15px;
		top: 50%;
		right: 13px;
		background-size: contain;
		background-position: 50% 50%;
		background-repeat: no-repeat;
		transform: translateY(-50%)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message_icon {
		padding-right: 50px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__content {
		position: relative;
		width: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__label {
		position: absolute;
		display: flex;
		justify-content: center;
		min-width: 92px;
		min-height: 24px;
		top: 50%;
		right: -11px;
		padding: 6px 10px 6px 15px;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODYiIGhlaWdodD0iMjIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0zLjU1MiAyLjQ2M0EzIDMgMCAwIDEgNi41MDQgMEg4NWExIDEgMCAwIDEgMSAxdjIwYTEgMSAwIDAgMS0xIDFIMi4zOTZBMiAyIDAgMCAxIC40MyAxOS42NDJMMy41NTIgMi40NjN6IiBmaWxsPSIjMzk3RkNBIi8+PC9zdmc+");
		background-position: 50% 50%;
		background-size: contain;
		background-repeat: no-repeat;
		color: #fff;
		font-size: 12px;
		font-weight: 700;
		line-height: 1;
		letter-spacing: -.3px;
		white-space: nowrap;
		transform: translateY(-50%)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__label:hover {
		color: #fff
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__label[data-sb-hover] {
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__label_new {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODYiIGhlaWdodD0iMjIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgY2xpcC1wYXRoPSJ1cmwoI2EpIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTMuNTUzIDIuNDYzQTMgMyAwIDAgMSA2LjUwNSAwSDg1YTEgMSAwIDAgMSAxIDF2MjBhMSAxIDAgMCAxLTEgMUgyLjM5N0ExLjk5OSAxLjk5OSAwIDAgMSAuNDMgMTkuNjQyTDMuNTUzIDIuNDYzeiIgZmlsbD0iIzJCRDk4NSIvPjwvZz48ZGVmcz48Y2xpcFBhdGggaWQ9ImEiPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0wIDBoODZ2MjJIMHoiLz48L2NsaXBQYXRoPjwvZGVmcz48L3N2Zz4=")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__label_icon:after {
		content: '';
		display: block;
		width: 12px;
		height: 12px;
		margin-left: 5px;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgb3BhY2l0eT0iLjczOCI+PHBhdGggb3BhY2l0eT0iLjU2OCIgZD0iTTExLjk4IDUuOTlBNS45OSA1Ljk5IDAgMSAwIDAgNS45OWE1Ljk5IDUuOTkgMCAwIDAgMTEuOTggMHoiIGZpbGw9IiNCMUI3QzUiLz48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTUuOTAyIDMuNjJjLjUgMCAuOTA2LS40MDIuOTA2LS44OTdhLjkwMi45MDIgMCAwIDAtLjkwNi0uODk4Yy0uNSAwLS45MDYuNDAyLS45MDYuODk4IDAgLjQ5NS40MDUuODk3LjkwNi44OTd6bS4zMTguODM1SDQuMTAydi44MDdoMS4wNTl2My4xNzlINC4xMDJ2Ljc5NGgzLjYwNnYtLjc5NGgtLjkwNFY0LjQ1N0g2LjIydi0uMDAyeiIgZmlsbD0iI2ZmZiIvPjwvZz48L3N2Zz4=");
		background-position: 50% 50%;
		background-size: contain;
		background-repeat: no-repeat
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list>.bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__message {
		min-height: 24px;
		padding: 6px 10px;
		color: #fff;
		font-size: 12px;
		font-weight: 600
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list>.bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__message_empty {
		display: none;
		min-height: 28px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__container[data-sb-hover]:hover,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message[data-sb-hover],
	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message_tooltip {
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__container .bx-sb-b24-price-table-tooltip.bx-sb-b24-price-table-tooltip_title {
		min-width: auto;
		padding: 8px 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar {
		margin: 10px 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar__message {
		display: inline;
		font-size: 14px;
		font-weight: 500;
		line-height: 1.5
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar__message_tooltip {
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar__soon {
		display: inline;
		padding: 2px 5px;
		background-color: #21bdee;
		border-radius: 10px;
		color: #fff;
		font-size: 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section {
		padding-left: 25px;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section:before {
		content: '';
		position: absolute;
		display: block;
		flex: 0 0 20px;
		width: 20px;
		height: 16px;
		left: 0;
		top: 50%;
		margin: auto 5px auto 0;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzYiIGhlaWdodD0iMjEiIHZpZXdCb3g9IjAgMCAzNiAyMSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3QgeD0iMTgiIHdpZHRoPSIyNSIgaGVpZ2h0PSI0IiB0cmFuc2Zvcm09InJvdGF0ZSg0NSAxOCAwKSIgZmlsbD0iIzY4RERGRiIvPgo8cmVjdCB5PSIxOCIgd2lkdGg9IjI1IiBoZWlnaHQ9IjQiIHRyYW5zZm9ybT0icm90YXRlKC00NSAwIDE4KSIgZmlsbD0iIzY4RERGRiIvPgo8L3N2Zz4K");
		background-position: center;
		background-size: contain;
		background-repeat: no-repeat
	}



	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section .bx-sb-b24-price-table-feature-sidebar__message {
		font-size: 20.8px;
		font-weight: 700
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_subsection .bx-sb-b24-price-table-feature-sidebar__message {
		font-size: 16px;
		font-weight: 600
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body {
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body_select .bx-sb-b24-price-table-feature-body__content {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body_select .bx-sb-b24-price-table-feature-body__content[data-sb-selected] {
		display: block
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body__content {
		width: 100%;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body__content[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__features:not(.bx-sb-b24-price-table__features_header) .bx-sb-b24-price-table-feature-body__content:not(.bx-sb-b24-price-table-feature-body__content_empty) {
		padding: 10px 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body__message {
		font-size: 12px;
		font-weight: 500;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-1,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-2,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-3,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-1,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-2,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-3 {
		display: inline-block;
		width: 31px;
		height: 15px;
		background-size: contain;
		background-position: 50% 50%;
		background-repeat: no-repeat
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-1 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PHBhdGggb3BhY2l0eT0iLjkiIGQ9Ik0zIDdhMyAzIDAgMCAxIDMtM2gyLjk0YS4wNi4wNiAwIDAgMSAuMDYuMDZ2NS44OGEuMDYuMDYgMCAwIDEtLjA2LjA2SDZhMyAzIDAgMCAxLTMtM3oiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjwvc3ZnPg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-2 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PHBhdGggb3BhY2l0eT0iLjkiIGQ9Ik0zIDdhMyAzIDAgMCAxIDMtM2gyLjk0YS4wNi4wNiAwIDAgMSAuMDYuMDZ2NS44OGEuMDYuMDYgMCAwIDEtLjA2LjA2SDZhMyAzIDAgMCAxLTMtM3oiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjxyZWN0IG9wYWNpdHk9Ii45IiB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjwvc3ZnPg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-g-3 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjY0NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjN0NBOTU5Ii8+PHBhdGggb3BhY2l0eT0iLjkiIGQ9Ik0zIDdhMyAzIDAgMCAxIDMtM2gyLjk0YS4wNi4wNiAwIDAgMSAuMDYuMDZ2NS44OGEuMDYuMDYgMCAwIDEtLjA2LjA2SDZhMyAzIDAgMCAxLTMtM3pNMjYgN2EzIDMgMCAwIDEtMyAzaC0zLjkzYS4wNy4wNyAwIDAgMS0uMDctLjA3VjQuMDdhLjA3LjA3IDAgMCAxIC4wNy0uMDdIMjNhMyAzIDAgMCAxIDMgM3oiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjxyZWN0IG9wYWNpdHk9Ii45IiB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiM1NzlGMUUiIGZpbGwtb3BhY2l0eT0iLjg4MyIvPjwvc3ZnPg==")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-1 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjk5NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjNzlCRUQ0Ii8+PHBhdGggZD0iTTMgN2EzIDMgMCAwIDEgMy0zaDIuOTRhLjA2LjA2IDAgMCAxIC4wNi4wNnY1Ljg4YS4wNi4wNiAwIDAgMS0uMDYuMDZINmEzIDMgMCAwIDEtMy0zeiIgZmlsbD0iIzI3OTFCMyIgZmlsbC1vcGFjaXR5PSIuODEiLz48L3N2Zz4=")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-2 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjk5NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjNzlCRUQ0Ii8+PHBhdGggZD0iTTMgN2EzIDMgMCAwIDEgMy0zaDIuOTRhLjA2LjA2IDAgMCAxIC4wNi4wNnY1Ljg4YS4wNi4wNiAwIDAgMS0uMDYuMDZINmEzIDMgMCAwIDEtMy0zeiIgZmlsbD0iIzI3OTFCMyIgZmlsbC1vcGFjaXR5PSIuODEiLz48cmVjdCB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiMyNzkxQjMiIGZpbGwtb3BhY2l0eT0iLjgxIi8+PC9zdmc+")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_battery-b-3 {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjkiIGhlaWdodD0iMTMiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggb3BhY2l0eT0iLjk5NCIgZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik02IDFhNiA2IDAgMSAwIDAgMTJoMTdhNiA2IDAgMCAwIDAtMTJINnptMCAxYTUgNSAwIDAgMCAwIDEwaDE3YTUgNSAwIDAgMCAwLTEwSDZ6IiBmaWxsPSIjNzlCRUQ0Ii8+PHBhdGggZD0iTTMgN2EzIDMgMCAwIDEgMy0zaDIuOTRhLjA2LjA2IDAgMCAxIC4wNi4wNnY1Ljg4YS4wNi4wNiAwIDAgMS0uMDYuMDZINmEzIDMgMCAwIDEtMy0zek0yNiA3YTMgMyAwIDAgMS0zIDNoLTMuOTNhLjA3LjA3IDAgMCAxLS4wNy0uMDdWNC4wN2EuMDcuMDcgMCAwIDEgLjA3LS4wN0gyM2EzIDMgMCAwIDEgMyAzeiIgZmlsbD0iIzI3OTFCMyIgZmlsbC1vcGFjaXR5PSIuODEiLz48cmVjdCB4PSIxMSIgeT0iNCIgd2lkdGg9IjYiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiMyNzkxQjMiIGZpbGwtb3BhY2l0eT0iLjgxIi8+PC9zdmc+")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_check,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_uncheck {
		width: 0;
		height: 0;
		margin: auto;
		padding: 8px;
		background-position: 50% 50%;
		background-size: 14px;
		background-repeat: no-repeat
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_check {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iMTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iNyIgY3k9IjciIHI9IjciIGZpbGw9IiM5M0MyMDAiLz48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0ibTcuNTIzIDguNTYgMy4wMzYtMy4wMzYtMS4xMjEtMS4xMjItMy4wMzMgMy4wMzQtMS42MDctMS42MTdMMy42NzYgNi45NGwxLjYwNyAxLjYxNy0uMDA0LjAwNCAxLjEyMiAxLjEyMSAxLjEyMi0xLjEyMXoiIGZpbGw9IiNmZmYiLz48L3N2Zz4=")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_uncheck {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iMTQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iNyIgY3k9IjciIHI9IjciIGZpbGw9IiM1MjVDNjkiIGZpbGwtb3BhY2l0eT0iLjIzNiIvPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik00IDYuMjI2aDZ2MS41NDhINHoiLz48L3N2Zz4=")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-archive {
		display: flex;
		align-items: center;
		flex-direction: column
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-archive__button {
		position: relative;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		max-width: 100%;
		min-height: 32px;
		padding: 10px 15px;
		background-color: #fff;
		border: 2px solid #3bc8f5;
		border-radius: 30px;
		color: #262626;
		font-size: 14px;
		font-weight: 600;
		line-height: 1;
		transition: all 0.2s ease-in-out;
		white-space: nowrap
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-archive__button:hover {
		color: #262626
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-archive__description {
		margin: 0 0 10px 0;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-archive__message {
		color: #525c69;
		font-size: 14px;
		font-weight: 600;
		line-height: 1.2
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-selector {
		display: flex;
		align-items: center;
		flex-direction: column
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-selector__description {
		margin: 0 0 10px 0;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-selector__message {
		color: #fff;
		/* font-size: 14px; */
		/* font-weight: 600; */
		line-height: 1.2
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select {
		display: inline-block;
		position: relative;
		min-width: 160px;
		max-width: 100%;
		padding: 0;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iOSIgdmlld0JveD0iMCAwIDE0IDkiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTEuNzIzIDAuNzkxNzQ4TDcuOTUwNDIgNC41NjQyOUw2Ljk5OTk5IDUuNTAwMDFMNi4wNjc1OCA0LjU2NDI5TDIuMjk1MDMgMC43OTE3NDhMMC45NjM4MTIgMi4xMjI5N0w3LjAwODk0IDguMTY4MUwxMy4wNTQxIDIuMTIyOTdMMTEuNzIzIDAuNzkxNzQ4WiIgZmlsbD0iIzUyNUM2OSIvPgo8L3N2Zz4K");
		background-repeat: no-repeat;
		outline: none;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		transition: all 0.2s ease-in-out;
		z-index: 3
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select::-ms-expand {
		display: none
	}

	.bx-sb-b24-price-table select.bx-sb-b24-price-table-select {
		color: #262626
	}

	.bx-sb-b24-price-table select.bx-sb-b24-price-table-select option {
		background-color: #f8f9fa;
		color: #495057
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__select {
		position: relative;
		display: flex;
		align-items: center;
		color: #262626;
		white-space: nowrap;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__list {
		position: absolute;
		display: block;
		width: calc(100% + 4px);
		height: 0;
		top: calc(100% + 4px);
		left: 50%;
		padding: 0 15px 0 10px;
		background-color: #fff;
		border: 0 solid rgba(0, 0, 0, 0.09);
		border-radius: 18px;
		box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.09);
		transform: translateX(-50%);
		overflow: hidden;
		opacity: 0;
		transition: all 0.2s ease-in-out
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__list[data-sb-select-active] {
		height: auto;
		padding-top: 10px;
		padding-bottom: 10px;
		border-width: 1px;
		overflow: visible;
		opacity: 1;
		z-index: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__item {
		display: flex;
		justify-content: space-between;
		padding: 10px 0;
		color: #495057;
		font-size: 14px;
		font-weight: 400;
		line-height: 1;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__item [data-link],
	.bx-sb-b24-price-table .bx-sb-b24-price-table-select__item [data-link]:hover {
		color: #495057
	}

	.bx-sb-b24-price-table select.bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue {
		padding: 9px 23px 9px 10px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue {
		background-color: #fff;
		background-position: 95% 50%;
		background-size: 12px 12px;
		border: 2px solid #3bc8f5;
		border-radius: 30px;
		font-size: 14px;
		font-weight: 600;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue[data-sb-select-active] {
		border-radius: 3px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue .bx-sb-b24-price-table-select__select {
		padding: 9px 23px 9px 10px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue .bx-sb-b24-price-table-select__select {
		justify-content: space-between;
		min-height: 32px;
		padding-top: 5px;
		padding-bottom: 5px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue .bx-sb-b24-price-table-select__select span {
		display: block;
		margin-left: 5px;
		padding: 4px 5px;
		background-color: #ffd91a;
		border-radius: 3px;
		font-size: 14px;
		font-weight: 700;
		line-height: 1;
		transform: skewX(-10deg)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_blue .bx-sb-b24-price-table-select__item span {
		display: inline-block;
		margin-left: 2px;
		padding: 12px 8px;
		background-color: #ffd717;
		border-radius: 3px;
		font-size: 14px;
		font-weight: 700;
		line-height: 0;
		transform: skewX(-10deg)
	}

	.bx-sb-b24-price-table select.bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user {
		padding: 11px 10px 11px 10px;
		background-color: transparent;
		border: 2px solid #a6c7cc;
		border-radius: 6px;
		font-size: 24px;
		font-weight: 600;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user {
		min-width: 180px;
		margin: -4px 0;
		padding: 4px 0;
		background-position: 95% 50%;
		background-size: 12px 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__select {
		justify-content: center;
		margin: -4px 0 -4px 0;
		padding: 4px;
		border: 2px solid #a6c7cc;
		border-radius: 6px;
		font-weight: 600
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__select span[data-section] {
		display: flex;
		flex-direction: column;
		align-items: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__select span[data-value] {
		padding: 6px;
		font-size: 24px;
		line-height: .7
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__select span[data-section="unlimited"] span[data-value] {
		font-size: 16px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__select span[data-message] {
		font-size: 14px;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user[data-sb-select-active] {
		background-color: #fff;
		border-radius: 6px;
		box-shadow: 0 5px 10px 1px rgba(0, 0, 0, 0.09)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user[data-sb-select-active] .bx-sb-b24-price-table-select__select {
		border-color: transparent
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__list {
		width: calc(120% + 4px);
		padding-left: 25px;
		padding-right: 25px;
		border-radius: 14px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__list[data-sb-select-active] {
		padding-top: 15px;
		padding-bottom: 15px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__item {
		padding: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__item span[data-section] {
		display: block;
		padding: 10px 0;
		font-weight: 600;
		white-space: nowrap
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__item span[data-value] {
		font-size: 16px;
		white-space: nowrap
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-select.bx-sb-b24-price-table-select_user .bx-sb-b24-price-table-select__item span[data-message] {
		margin-left: 3px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup {
		position: fixed;
		display: block;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		opacity: .5;
		visibility: hidden;
		transition: opacity .130ms ease-in-out;
		z-index: 3000
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup[data-sb-popup-opened] {
		opacity: 1;
		visibility: visible
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__overflow {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		background-color: rgba(38, 38, 38, 0.15)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup:not([data-sb-popup-opened]) {
		width: 0;
		height: 0;
		overflow: hidden
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__inner {
		position: absolute;
		width: calc(100% - 80px);
		max-height: calc(90% - 70px);
		height: 100%;
		max-width: 400px;
		top: 50%;
		left: 50%;
		padding: 15px 10px;
		background-color: #fff;
		border-radius: 30px;
		box-shadow: 0 14px 16px 0 rgba(82, 92, 105, 0.23);
		transform: translate(-50%, -50%);
		z-index: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close {
		position: absolute;
		top: -37px;
		right: 0;
		width: 32px;
		height: 32px;
		border: 2px solid rgba(255, 255, 255, 0.7);
		border-radius: 50%;
		background-color: rgba(0, 0, 0, 0.1);
		opacity: 1;
		transition: all 300ms ease;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close:hover {
		border: 2px solid #fff;
		background-color: rgba(0, 0, 0, 0.2)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close:before,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close:after {
		content: '';
		position: absolute;
		top: 50%;
		left: 50%;
		width: 16px;
		height: 2px;
		background-color: #fff
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close:before {
		transform: translateX(-50%) translateY(-50%) rotate(-45deg)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close:after {
		transform: translateX(-50%) translateY(-50%) rotate(45deg)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__content {
		height: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__content {
		font-size: 12px;
		font-weight: 600;
		line-height: 1
	}

	.bxst-prices-table-sidebar-column-item .bx-ui-button {
		padding-left: 30px !important;
		padding-right: 30px !important;
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__windows {
		height: calc(100% - 55px)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control {
		position: absolute;
		display: none;
		align-items: center;
		justify-content: space-between;
		width: 100%;
		height: 0;
		top: 50%;
		left: 0;
		transform: translateY(-50%)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control_column {
		display: flex
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_next,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_prev {
		position: relative;
		width: 35px;
		height: 90px;
		background-size: cover;
		background-repeat: no-repeat;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_next {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUyIiBoZWlnaHQ9IjE1MiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWx0ZXI9InVybCgjYSkiPjxjaXJjbGUgY3g9Ijc2IiBjeT0iNzQiIHI9IjcyIiB0cmFuc2Zvcm09InJvdGF0ZSgtMTgwIDc2IDc0KSIgZmlsbD0iI2ZmZiIgZmlsbC1vcGFjaXR5PSIuNTUiLz48L2c+PGcgZmlsdGVyPSJ1cmwoI2IpIj48cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0ibTQ1LjM2IDg0Ljg0MS04LjY3OC04LjY3NkwzNC40MzUgNzRsMi4yNDctMi4xNjYgOC42NzctOC42NzctMy4wNjItMy4wNjJMMjguMzk0IDc0bDEzLjkwMyAxMy45MDQgMy4wNjItMy4wNjJ6IiBmaWxsPSIjZmZmIi8+PC9nPjxkZWZzPjxmaWx0ZXIgaWQ9ImEiIHg9IjAiIHk9IjAiIHdpZHRoPSIxNTIiIGhlaWdodD0iMTUyIiBmaWx0ZXJVbml0cz0idXNlclNwYWNlT25Vc2UiIGNvbG9yLWludGVycG9sYXRpb24tZmlsdGVycz0ic1JHQiI+PGZlRmxvb2QgZmxvb2Qtb3BhY2l0eT0iMCIgcmVzdWx0PSJCYWNrZ3JvdW5kSW1hZ2VGaXgiLz48ZmVDb2xvck1hdHJpeCBpbj0iU291cmNlQWxwaGEiIHZhbHVlcz0iMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMTI3IDAiIHJlc3VsdD0iaGFyZEFscGhhIi8+PGZlT2Zmc2V0IGR5PSIyIi8+PGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iMiIvPjxmZUNvbG9yTWF0cml4IHZhbHVlcz0iMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMC4wNDc1NzUgMCIvPjxmZUJsZW5kIGluMj0iQmFja2dyb3VuZEltYWdlRml4IiByZXN1bHQ9ImVmZmVjdDFfZHJvcFNoYWRvdyIvPjxmZUJsZW5kIGluPSJTb3VyY2VHcmFwaGljIiBpbjI9ImVmZmVjdDFfZHJvcFNoYWRvdyIgcmVzdWx0PSJzaGFwZSIvPjwvZmlsdGVyPjxmaWx0ZXIgaWQ9ImIiIHg9IjI0LjM5NCIgeT0iNTguMDk1IiB3aWR0aD0iMjQuOTY2IiBoZWlnaHQ9IjM1LjgwOCIgZmlsdGVyVW5pdHM9InVzZXJTcGFjZU9uVXNlIiBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9InNSR0IiPjxmZUZsb29kIGZsb29kLW9wYWNpdHk9IjAiIHJlc3VsdD0iQmFja2dyb3VuZEltYWdlRml4Ii8+PGZlQ29sb3JNYXRyaXggaW49IlNvdXJjZUFscGhhIiB2YWx1ZXM9IjAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDEyNyAwIiByZXN1bHQ9ImhhcmRBbHBoYSIvPjxmZU9mZnNldCBkeT0iMiIvPjxmZUdhdXNzaWFuQmx1ciBzdGREZXZpYXRpb249IjIiLz48ZmVDb21wb3NpdGUgaW4yPSJoYXJkQWxwaGEiIG9wZXJhdG9yPSJvdXQiLz48ZmVDb2xvck1hdHJpeCB2YWx1ZXM9IjAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAuMSAwIi8+PGZlQmxlbmQgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0iZWZmZWN0MV9kcm9wU2hhZG93Ii8+PGZlQmxlbmQgaW49IlNvdXJjZUdyYXBoaWMiIGluMj0iZWZmZWN0MV9kcm9wU2hhZG93IiByZXN1bHQ9InNoYXBlIi8+PC9maWx0ZXI+PC9kZWZzPjwvc3ZnPg==");
		background-position: left center;
		transform: translateX(-100%)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_prev {
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTUyIiBoZWlnaHQ9IjE1MiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWx0ZXI9InVybCgjYSkiPjxjaXJjbGUgY3g9Ijc2IiBjeT0iNzQiIHI9IjcyIiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9Ii41NSIvPjwvZz48ZyBmaWx0ZXI9InVybCgjYikiPjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJtMTA2LjY0MSA2My4xNTggOC42NzcgOC42NzdMMTE3LjU2NSA3NGwtMi4yNDcgMi4xNjYtOC42NzcgOC42NzcgMy4wNjIgMy4wNjJMMTIzLjYwNiA3NGwtMTMuOTAzLTEzLjkwNC0zLjA2MiAzLjA2MXoiIGZpbGw9IiNmZmYiLz48L2c+PGRlZnM+PGZpbHRlciBpZD0iYSIgeD0iMCIgeT0iMCIgd2lkdGg9IjE1MiIgaGVpZ2h0PSIxNTIiIGZpbHRlclVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY29sb3ItaW50ZXJwb2xhdGlvbi1maWx0ZXJzPSJzUkdCIj48ZmVGbG9vZCBmbG9vZC1vcGFjaXR5PSIwIiByZXN1bHQ9IkJhY2tncm91bmRJbWFnZUZpeCIvPjxmZUNvbG9yTWF0cml4IGluPSJTb3VyY2VBbHBoYSIgdmFsdWVzPSIwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAxMjcgMCIgcmVzdWx0PSJoYXJkQWxwaGEiLz48ZmVPZmZzZXQgZHk9IjIiLz48ZmVHYXVzc2lhbkJsdXIgc3RkRGV2aWF0aW9uPSIyIi8+PGZlQ29sb3JNYXRyaXggdmFsdWVzPSIwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwLjA0NzU3NSAwIi8+PGZlQmxlbmQgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0iZWZmZWN0MV9kcm9wU2hhZG93Ii8+PGZlQmxlbmQgaW49IlNvdXJjZUdyYXBoaWMiIGluMj0iZWZmZWN0MV9kcm9wU2hhZG93IiByZXN1bHQ9InNoYXBlIi8+PC9maWx0ZXI+PGZpbHRlciBpZD0iYiIgeD0iMTAyLjY0MSIgeT0iNTguMDk3IiB3aWR0aD0iMjQuOTY2IiBoZWlnaHQ9IjM1LjgwOCIgZmlsdGVyVW5pdHM9InVzZXJTcGFjZU9uVXNlIiBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9InNSR0IiPjxmZUZsb29kIGZsb29kLW9wYWNpdHk9IjAiIHJlc3VsdD0iQmFja2dyb3VuZEltYWdlRml4Ii8+PGZlQ29sb3JNYXRyaXggaW49IlNvdXJjZUFscGhhIiB2YWx1ZXM9IjAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDEyNyAwIiByZXN1bHQ9ImhhcmRBbHBoYSIvPjxmZU9mZnNldCBkeT0iMiIvPjxmZUdhdXNzaWFuQmx1ciBzdGREZXZpYXRpb249IjIiLz48ZmVDb21wb3NpdGUgaW4yPSJoYXJkQWxwaGEiIG9wZXJhdG9yPSJvdXQiLz48ZmVDb2xvck1hdHJpeCB2YWx1ZXM9IjAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAuMSAwIi8+PGZlQmxlbmQgaW4yPSJCYWNrZ3JvdW5kSW1hZ2VGaXgiIHJlc3VsdD0iZWZmZWN0MV9kcm9wU2hhZG93Ii8+PGZlQmxlbmQgaW49IlNvdXJjZUdyYXBoaWMiIGluMj0iZWZmZWN0MV9kcm9wU2hhZG93IiByZXN1bHQ9InNoYXBlIi8+PC9maWx0ZXI+PC9kZWZzPjwvc3ZnPg==");
		background-position: right center;
		transform: translateX(100%)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window {
		position: relative;
		display: flex;
		flex-direction: column;
		height: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__windows .bx-sb-b24-price-table-window:not([data-sb-popup-opened]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-tooltip-hover {
		padding: 6px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-tooltip-hover:before {
		width: 11px;
		height: 11px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_check,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-icon.bx-sb-b24-price-table-icon_uncheck {
		background-size: 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__prologue {
		flex: 0 0 auto;
		margin-bottom: 3px;
		padding-bottom: 13px;
		border-bottom: 2px solid rgba(47, 198, 246, 0.22)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__prologue .bx-sb-b24-price-table-window__row {
		flex-direction: column
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content {
		flex: 1;
		height: 100%;
		overflow-y: auto;
		scrollbar-width: thin;
		scrollbar-color: rgba(82, 92, 105, 0.35) rgba(82, 92, 105, 0.1)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content::-webkit-scrollbar-track {
		width: 11px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content::-webkit-scrollbar {
		width: 6px;
		background-color: rgba(82, 92, 105, 0.1);
		border-radius: 6px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content::-webkit-scrollbar-thumb {
		background-color: rgba(82, 92, 105, 0.35);
		border-radius: 6px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__categories {
		margin-top: 34px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__order {
		margin-top: 15px;
		flex: 0 0 auto
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__order .bx-sb-b24-price-table-order__button {
		min-width: 100px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-direction: row
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content .bx-sb-b24-price-table-window__row {
		border-radius: 5px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__content .bx-sb-b24-price-table-window__row {
		padding: 7px 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__supply .bx-sb-b24-price-table-window__row.bx-sb-b24-price-table-window__row_line {
		background-color: rgba(237, 238, 240, 0.3)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__categories {
		padding: 10px 0;
		background-color: rgba(47, 198, 246, 0.05);
		border-radius: 18px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__sidebar {
		flex: 1 0 calc(50% - 10px);
		max-width: calc(50% - 10px);
		width: 100%;
		margin-left: 10px;
		margin-right: 0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__sidebar.bx-sb-b24-price-table-window__sidebar_sub {
		padding-left: 10px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__sidebar.bx-sb-b24-price-table-window__sidebar_sub .bx-sb-b24-price-table-window-sidebar__message {
		color: #262626;
		font-size: 12px;
		font-weight: 400
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row.bx-sb-b24-price-table-window__row_categories-title {
		color: rgba(82, 92, 105, 0.56);
		font-size: 11px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__body {
		flex: 1 0 50%;
		max-width: 50%;
		width: 50%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__columns {
		display: flex;
		align-items: center;
		justify-content: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__column {
		flex: 1 0;
		max-width: 160px;
		padding: 0 2px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row .bx-sb-b24-price-table .bx-sb-b24-price-table-window__columns,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row .bx-sb-b24-price-table .bx-sb-b24-price-table-window__column {
		height: 100%
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row .bx-sb-b24-price-table-tooltip {
		width: 350px;
		top: auto
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row.bx-sb-b24-price-table-window__row_click {
		margin: 0 5px;
		border-radius: 18px;
		transition: all 0.2s ease-in-out;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row.bx-sb-b24-price-table-window__row_click:hover {
		background-color: rgba(82, 92, 105, 0.04)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window__row.bx-sb-b24-price-table-window__row_click .bx-sb-b24-price-table-window-sidebar__message {
		padding-bottom: 1px;
		border-bottom: 1px dashed rgba(38, 38, 38, 0.5)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header_center {
		display: flex;
		justify-content: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__title {
		font-size: 19px;
		font-weight: 600;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__soon {
		display: inline-block;
		margin-top: 3px;
		padding: 2px 5px;
		background-color: #21bdee;
		border-radius: 10px;
		color: #fff;
		font-size: 12px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__product {
		margin: 0 auto;
		padding: 10px 5px;
		max-width: 160px;
		min-width: 100%;
		background-color: rgba(0, 0, 0, 0.15);
		border-radius: 18px;
		font-size: 12px;
		font-weight: 600;
		line-height: 1;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__product_green {
		background-color: rgba(169, 212, 0, 0.23)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__product_aquamarine {
		background-color: rgba(49, 247, 237, 0.2)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-sidebar__content {
		display: inline
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-sidebar__message {
		display: inline;
		line-height: 1.25
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-sidebar__message_tooltip {
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-sidebar__soon {
		display: inline;
		padding: 1px 5px;
		background-color: #21bdee;
		border-radius: 10px;
		color: #fff
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-body__content {
		width: 100%;
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-body__content[data-sb-section-search]:not([data-sb-selected]) {
		display: none
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window-body__message {
		font-weight: 500;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip-hover {
		position: relative;
		display: inline;
		width: 0;
		height: 0;
		left: 22px;
		margin: auto 0 auto -12px;
		padding: 6px 0;
		border-radius: 100%;
		font-size: 0;
		line-height: 0;
		vertical-align: middle;
		cursor: pointer;
		z-index: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip-hover:before {
		content: '';
		position: absolute;
		display: inline;
		top: 50%;
		left: 50%;
		width: 12px;
		height: 12px;
		background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTEiIGhlaWdodD0iMTEiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMC45ODEgNS40OWE1LjQ5IDUuNDkgMCAxIDAtMTAuOTggMCA1LjQ5IDUuNDkgMCAwIDAgMTAuOTggMHpNMy4zNyA0LjA1NGMwLS4yNjkuMDg2LS41NDEuMjU5LS44MTcuMTcyLS4yNzYuNDI0LS41MDQuNzU1LS42ODUuMzMtLjE4LjcxNi0uMjcxIDEuMTU4LS4yNzEuNDEgMCAuNzcyLjA3NSAxLjA4NS4yMjcuMzE0LjE1LjU1Ny4zNTcuNzI4LjYxNy4xNzEuMjYuMjU3LjU0My4yNTcuODQ4IDAgLjI0LS4wNS40NTEtLjE0Ny42MzJhMS45MzQgMS45MzQgMCAwIDEtLjM0OC40NjljLS4xMzQuMTMxLS4zNzUuMzUzLS43MjMuNjY0YTIuOTQgMi45NCAwIDAgMC0uMjMxLjIzLjkzOC45MzggMCAwIDAtLjEzLjE4My44OS44OSAwIDAgMC0uMDY1LjE2NiA2LjM3MyA2LjM3MyAwIDAgMC0uMDcuMjljLS4wNTQuMjk0LS4yMjIuNDQxLS41MDUuNDQxYS41MTYuNTE2IDAgMCAxLS4zNzEtLjE0NGMtLjEtLjA5Ni0uMTUtLjIzOS0uMTUtLjQyOCAwLS4yMzguMDM2LS40NDMuMTEtLjYxNy4wNzMtLjE3NC4xNy0uMzI3LjI5Mi0uNDU4YTYuNyA2LjcgMCAwIDEgLjQ5Mi0uNDdjLjE4MS0uMTU4LjMxMi0uMjc3LjM5My0uMzU4LjA4LS4wOC4xNDgtLjE3LjIwMy0uMjY5YS42NTEuNjUxIDAgMCAwIC4wODMtLjMyMi43NS43NSAwIDAgMC0uMjUyLS41NzNjLS4xNjktLjE1Ni0uMzg2LS4yMzMtLjY1MS0uMjMzLS4zMTIgMC0uNTQuMDc4LS42ODguMjM1LS4xNDcuMTU3LS4yNzEuMzg4LS4zNzMuNjk0LS4wOTYuMzItLjI3OC40NzktLjU0Ny40NzlhLjUzOC41MzggMCAwIDEtLjQwMS0uMTY4LjUxMi41MTIgMCAwIDEtLjE2My0uMzYyem0xLjYxOCA0LjQ4MWMuMTI5LjExMi4yOC4xNjguNDUyLjE2OGEuNjQ0LjY0NCAwIDAgMCAuNDQtLjE3LjU5Mi41OTIgMCAwIDAgLjE5Mi0uNDY3LjYxMS42MTEgMCAwIDAtLjE4My0uNDUuNjExLjYxMSAwIDAgMC0uNDUtLjE4Mi42My42MyAwIDAgMC0uNjQ0LjYzMmMwIC4yMDEuMDY0LjM1OC4xOTMuNDd6IiBmaWxsPSIjQjFCN0M1IiBvcGFjaXR5PSIuNzM4Ii8+PC9zdmc+");
		background-position: 50%;
		background-size: contain;
		background-repeat: no-repeat;
		line-height: 1;
		transform: translate(-50%, -50%);
		z-index: 2
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip {
		position: absolute;
		display: none;
		min-width: 260px;
		max-width: 100%;
		top: 100%;
		margin-top: 15px;
		padding: 20px 12px;
		background: #fff;
		border-radius: 12px;
		font-size: 12px;
		font-weight: 400;
		line-height: 1.5;
		box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
		z-index: 4
	}


	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip .bx-sb-b24-price-table-tooltip__close {
		position: absolute;
		width: 16px;
		height: 16px;
		top: 10px;
		right: 10px;
		background: transparent;
		transition: all 0.2s ease-in-out;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip .bx-sb-b24-price-table-tooltip__close:before,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-tooltip .bx-sb-b24-price-table-tooltip__close:after {
		content: '';
		position: absolute;
		display: block;
		width: 16px;
		height: 1px;
		top: 50%;
		left: 50%;
		background-color: #adb5bd;
		transition: all 0.2s ease-in-out
	}



	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__title {
		margin: 10px auto;
		color: #21bdee;
		font-size: 14px;
		text-transform: uppercase;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__runner {
		display: block;
		position: relative;
		width: 44px;
		height: 24px;
		margin: 0 22px;
		font-size: 14px;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__slide {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #fff;
		border: 2px solid #21bdee;
		border-radius: 12px;
		transition: .4s linear;
		cursor: pointer
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__slide:before {
		content: '';
		position: absolute;
		width: 16px;
		height: 16px;
		left: 3px;
		bottom: 2px;
		background-color: #21bdee;
		border-radius: 100%;
		-webkit-transition: .4s;
		transition: .4s
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__runner.checked .bx-sb-b24-price-table-feature-switch__slide:before {
		-webkit-transform: translateX(18px);
		-ms-transform: translateX(18px);
		transform: translateX(18px)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-header {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		margin-bottom: 15px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-header__title {
		margin-bottom: 15px;
		font-size: 19.2px;
		font-weight: 500;
		line-height: 1;
		text-transform: uppercase
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive {
		display: none;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		margin-bottom: 30px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title {
		display: flex;
		align-items: center;
		flex: 0 0 auto;
		margin: 10px;
		color: #21bdee;
		font-size: 16px;
		font-weight: 400;
		line-height: 1;
		text-transform: uppercase
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title:hover {
		color: #21bdee;
		text-decoration: none;
		opacity: .7
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title_icon-1:before,
	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title_icon-2:before {
		content: '';
		display: block;
		margin-right: 10px;
		background-size: contain;
		background-position: 50%;
		background-repeat: no-repeat
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title_icon-1:before {
		width: 22px;
		height: 30px;
		background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAfCAYAAAD9cg1AAAAB8klEQVRIie2WP0gcQRSHv5PDkWCqqIUcJJBCtNJmggEhRSBRDFhJ7MTqrFLERmwDVsHWSiwstDFdSMBKJMFpTkNALFIEbPyDRBRkcp7K23tjxnPPRmzCPpjbmffN+72Z2d3bl8P5HeCAdGsDHgK/6vCnwDGwV4e3gPMbdaCwaZwv3cJLyZz6fCOvnUZgG8gpMsDHaKIFPgMn6mkGBiI+AbwHvHougA7pNKjjAXCENU+SBiNAIVpLO7AQ8QX1BSskMf/4kWpeJbg3yxJkCe5u+UihGedfaL87RbkQ8UIK78aF9yx5EROrJrDmD84vAaPqPwfmgX4dfwdeR/xAfcGWlYWFLalmtANrpm6syfl+ZbtAMYWH2FVgNe08s8c0S5Al+B8S5K+NnH8OPAZWsGa/hknl8UpHX7Hmbw1vBV4Cv7HmW3A3RBNmAKlxpERxON8VsSZgDRjWtqa+wLuSmGrstGpFO3D+ETAIdGLNGc6vA++AQ533BviJNWM6f059wWTuJNYs4rxobuH8h3gHoeC60Gul5gEQXo7G5Sgm6FRqNHLVHykdrZGPxayev5SKb4EhLcDkOyD3Rv7/ZWdiz4BeQM76C7AIfNJrj96HomjHqxzXclFKyD6s+XFFrDlVwRVtveoLfDOJqcaKhmjpNu6zuoaWS+swnRAL4ID2AAAAAElFTkSuQmCC")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive__title_icon-2:before {
		width: 32px;
		height: 26px;
		background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAaCAYAAADWm14/AAACn0lEQVRIicWWTYhNYRjHf8bkRb4WVhZMPhKllOa1G8RGUyRsdKVhIVmMsjM+hlKzwkZSE3c1G0WRj7oXI2Wm12dpotzUZIXZaHz0KtL7nue6x7nnk8F/cU/nnOd5/v//c859njOJOBhbAZYC32PvF0cr8BitNkczmwUYuxh4CdwALmdQrZfj7Yy4XcBqoA2t3mUJKAMbgDmSMJZY1tgz/qjVgZSY+UANeA9cisa2RIKd+xKwHXgFHMpwlgeuxgNgD7BXBCUIgMNAFa2GJHEfxs77beqAbDfQi1a3gIdAT7yAhvtef67VTeAJcPSP3Ws1KOdHfCcCroiAhvvh0LUe78DYRYWpw+7r0Oqe54BjvwqIum8kOOWDorwoou7DRndg7PJwB+Lc1+Eewc56Qk73C5rcN0w9Aq4BJwMBxi6Jdd9IGJaEEwU6cDzBfR2uO5swdpWbUOflZZuKsWsTEq4C/Ri7UV7OZBi7xncMDqbUc7gDnHUC1smFuzmctQPpAmCrvFunc9TzM/qt/79rdSXD2QvgTY6aT/0o12pZRr0twDmntCItSwtul+VUzSGg6mODnDQ4zooT0Ad0YmwpgdzthItAGa2yOxDElH1OkBtXs+Q5oa8FrUaA/cAFjD31c1YbqzDWrU8DWKA7h/s6uiXH+BquFjKcHIfjcpxajbSI6n5R5LbgKMaOA5+AAeA60IFW47npg9gOyR3wtYKao8LRKZyJ3wMLAZfwDK2+JBLlW8fTgJXATOA1WtXCt1tj1Ndkf08MAgNDSbWi6/if478LaH4EaTB2BjA3FDHL/xrbFro2hlYf/44A2CYzIYqu0HmXzIFciP8sT4KxU4DpGVGf0errxAowdgUwuZBY+IZWz7OC8j6C+8DsggI+yKd9MoAf6pTZq4mqlYgAAAAASUVORK5CYII=")
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__epilogue_archive {
		display: flex;
		flex-direction: column;
		align-items: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__compare {
		margin: 49px 0 43px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue-compare__button {
		position: relative;
		display: inline-block;
		max-width: 100%;
		padding: 16px 28px;
		background-color: #cfee52;
		border-radius: 30px;
		color: #262626;
		font-size: 17px;
		font-weight: 700;
		line-height: 1;
		text-align: center;
		text-transform: uppercase;
		transition: all 0.2s ease-in-out
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue-compare__button:hover {
		color: #262626;
		background-color: #cfff27
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__archive {
		display: flex;
		justify-content: center;
		width: 100%;
		max-width: 700px;
		margin: 0 auto 45px;
		padding-top: 38px
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__archive:not(:first-child) {
		border-top: 1px solid rgba(82, 92, 105, 0.1)
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__description {
		text-align: center
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__link {
		display: inline;
		border-bottom: 1px dashed #2066b0;
		color: #2066b0;
		font-size: 16px;
		font-weight: 600;
		line-height: 1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-epilogue__link:hover {
		color: #2066b0
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__runner {
		position: absolute;
		display: none;
		width: calc(100% - 12px);
		height: 0;
		left: 50%;
		margin: 0 auto;
		border: 2px solid transparent;
		border-radius: 18px;
		transform: translateX(-50%);
		transition: opacity .100ms ease-in-out, top .130ms ease-in-out;
		opacity: 0;
		z-index: -1
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table__runner[data-sb-runner-active] {
		border-color: rgba(33, 189, 238, 0.5);
		opacity: 1
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__row {
			justify-content: space-between;
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__sidebar {
			flex-basis: 260px;
			max-width: 260px;
			padding-right: 15px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__body {
			width: auto;
			flex-basis: calc(100% - 260px);
			max-width: calc(100% - 260px)
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col {
			flex-direction: row;
			align-items: stretch;
			flex-wrap: wrap
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col {
			flex-direction: row;
			align-items: stretch;
			flex-wrap: nowrap
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__column {
			width: 100%
		}
	}

	@media (max-width: 1199.98px) {
		.bx-sb-b24-price-table_wobbler .bx-sb-b24-price-table__columns {
			transform: none !important
		}
	}

	@media (max-width: 1199.98px) {
		.bx-sb-b24-price-table_wobbler .bx-sb-b24-price-table__columns .bx-sb-b24-price-table__column {
			opacity: 1 !important
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_wobbler[data-sb-b24-price-wobbler="PROJECT"]:not([data-wobbler-animation]) .bx-sb-b24-price-table__column[data-sb-column="ENT"],
		.bx-sb-b24-price-table_wobbler[data-sb-b24-price-wobbler="ENT"]:not([data-wobbler-animation]) .bx-sb-b24-price-table__column[data-sb-column="PROJECT"] {
			height: 0;
			visibility: hidden;
			overflow: hidden
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table.bx-sb-b24-price-table_features .bx-sb-b24-price-table__column {
			margin: 0 10px 0 0
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: auto;
			max-width: 50%
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			margin-bottom: 0
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_count_1 .bx-sb-b24-price-table__column,
		.bx-sb-b24-price-table_count_1 .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: 100%;
			max-width: 100%
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_count_2 .bx-sb-b24-price-table__column,
		.bx-sb-b24-price-table_count_2 .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: 50%;
			max-width: 50%
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_count_3 .bx-sb-b24-price-table__column,
		.bx-sb-b24-price-table_count_3 .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: 33%;
			max-width: 33%
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_count_4 .bx-sb-b24-price-table__column,
		.bx-sb-b24-price-table_count_4 .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: 25%;
			max-width: 25%
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_count_5 .bx-sb-b24-price-table__column,
		.bx-sb-b24-price-table_count_5 .bx-sb-b24-price-table__columns_col .bx-sb-b24-price-table__column {
			flex-basis: 20%;
			max-width: 20%
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table .bx-sb-b24-price-table__row .bx-sb-b24-price-table__columns,
		.bx-sb-b24-price-table .bx-sb-b24-price-table__row .bx-sb-b24-price-table__column {
			height: 100%
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table:not(.bx-sb-b24-price-table_features) .bx-sb-b24-price-table__column:first-child {
			margin-left: 0
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table:not(.bx-sb-b24-price-table_features) .bx-sb-b24-price-table__column:last-child {
			margin-right: 0
		}
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
		font-size: 20px
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
			font-size: 18px
		}
	}

	@media (min-width: 1380px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-header__title {
			font-size: 20px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-prologue {
			justify-content: space-between;
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-prologue__section:not(:first-child) {
			margin-top: 0
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__row.bx-sb-b24-price-table__features_header {
			display: flex
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply {
			justify-content: normal
		}
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__list {
		margin-left: 19px
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__list {
			margin-left: 10px
		}
	}

	@media (min-width: 1280px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__list {
			margin-left: 19px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__inner {
			align-items: stretch
		}
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message {
		font-size: 15px
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message {
			font-size: 12px
		}
	}

	@media (min-width: 1280px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message {
			font-size: 13.6px
		}
	}

	@media (min-width: 1380px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message {
			font-size: 15px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__message_empty {
			display: block
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-supply__list>.bx-sb-b24-price-table-supply__list .bx-sb-b24-price-table-supply__message_empty {
			display: block
		}
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section {
		display: flex
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section {
			display: block
		}
	}

	@media (max-width: 1279.98px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section {
			margin-top: 30px
		}
	}

	@media (min-width: 1280px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section:before {
			transform: translateY(-50%)
		}
	}

	@media (min-width: 1280px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__row.bx-sb-b24-price-table__features_section.section-hidden .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_section:before {
			margin-top: -8px
		}
	}

	@media (max-width: 1279.98px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_subsection {
			margin-top: 20px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_sub {
			max-width: calc(100% - 15px);
			padding-left: 15px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-sidebar.bx-sb-b24-price-table-feature-sidebar_sub .bx-sb-b24-price-table-feature-sidebar__message {
			color: rgba(38, 38, 38, 0.8)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-body__message {
			font-size: 14px
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-archive {
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-archive__description {
			margin-right: 10px;
			margin-bottom: 0
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-selector {
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-selector__description {
			margin-right: 10px;
			margin-bottom: 0
		}
	}

	@media (min-width: 768px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__inner {
			width: calc(100% - 80px);
			max-width: 500px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__inner {
			max-width: 1012px;
			padding: 17px 20px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__close {
			top: -22px;
			right: -22px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control {
			display: flex
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control_column {
			display: none
		}
	}

	@media (min-width: 768px) {

		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_next,
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_prev {
			width: 40px;
			height: 100px
		}
	}

	@media (min-width: 992px) {

		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_next,
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup-control__nav_prev {
			width: 55px;
			height: 144px
		}
	}

	@media (max-width: 991.98px) {

		.bx-sb-b24-price-table [data-sb-popup-content="PROJECT"] .bx-sb-b24-price-table-window__column:not([data-sb-window-column="PROJECT"]),
		.bx-sb-b24-price-table [data-sb-popup-content="BASIC"] .bx-sb-b24-price-table-window__column:not([data-sb-window-column="BASIC"]),
		.bx-sb-b24-price-table [data-sb-popup-content="STD"] .bx-sb-b24-price-table-window__column:not([data-sb-window-column="STD"]),
		.bx-sb-b24-price-table [data-sb-popup-content="PRO100"] .bx-sb-b24-price-table-window__column:not([data-sb-window-column="PRO100"]),
		.bx-sb-b24-price-table [data-sb-popup-content="ENT"] .bx-sb-b24-price-table-window__column:not([data-sb-window-column="ENT"]) {
			display: none
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window__prologue .bx-sb-b24-price-table-window__row {
			flex-direction: row
		}
	}

	@media (max-width: 991.98px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window__prologue .bx-sb-b24-price-table-window__row .bx-sb-b24-price-table-window__sidebar {
			flex: 1 0 auto;
			max-width: 100%;
			margin: 0 auto 10px;
			text-align: center
		}
	}

	@media (max-width: 991.98px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__order .bx-sb-b24-price-table-window .bx-sb-b24-price-table-window__sidebar {
			display: none
		}
	}

	@media (max-width: 991.98px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-popup__order .bx-sb-b24-price-table-window .bx-sb-b24-price-table-window__body {
			margin: 0 auto
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window__sidebar {
			flex-basis: 200px;
			max-width: 200px;
			margin-left: 19px;
			margin-right: 15px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window__body {
			width: auto;
			flex-basis: calc(100% - 234px);
			max-width: calc(100% - 234px)
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window-header__product {
			display: inline-block
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table_count_1 .bx-sb-b24-price-table-window__column {
			flex-basis: calc(100% - 2px);
			max-width: calc(100% - 2px)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table_count_2 .bx-sb-b24-price-table-window__column {
			flex-basis: calc(50% - 2px);
			max-width: calc(50% - 2px)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table_count_3 .bx-sb-b24-price-table-window__column {
			flex-basis: calc(33% - 2px);
			max-width: calc(33% - 2px)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table_count_4:not(.bx-sb-b24-price-table_wobbler) .bx-sb-b24-price-table-window__column {
			flex-basis: calc(25% - 2px);
			max-width: calc(25% - 2px)
		}
	}

	@media (min-width: 1200px) {

		.bx-sb-b24-price-table_wobbler .bx-sb-b24-price-table-window__column,
		.bx-sb-b24-price-table_count_5 .bx-sb-b24-price-table-window__column {
			flex-basis: calc(20% - 2px);
			max-width: calc(20% - 2px)
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch {
			display: flex;
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-switch__title {
			margin: 0
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-header {
			justify-content: space-between;
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-header__title {
			margin-bottom: 0
		}
	}

	@media (min-width: 768px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive {
			display: flex
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive {
			flex-direction: row
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-feature-archive {
			max-width: calc(100% - 260px);
			margin-left: 260px
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__runner {
			display: block;
			max-width: calc(1170px - 12px)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__runner {
			max-width: calc(1250px - 12px)
		}
	}

	@media (min-width: 1280px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__runner {
			max-width: calc(1350px - 12px)
		}
	}

	@media (min-width: 1200px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table__wobblers {
			display: block
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-order__content {
			position: relative
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-order__content .bx-sb-b24-price-table-order__button {
			display: inline-block
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-order__content .portal-buy-button-tooltip__window {
			position: static
		}
	}

	@media (min-width: 992px) {
		.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-order__content .portal-buy-button-tooltip-window {
			top: auto;
			bottom: calc(100% + 10px)
		}
	}

	.bx-sb-b24-price-table .bx-sb-b24-price-table-window .bx-sb-b24-price-table-order__content .portal-buy-button-tooltip-window__overlay {
		display: none
	}

	.bx-sb-slide-panel {
		width: 100%;
		height: 100%
	}

	.bx-sb-slide-panel .bx-sb-slide-panel__frame-body,
	.bx-sb-slide-panel .bx-sb-slide-panel__frame {
		width: 100%;
		height: 100%
	}

	/* End */




	/* Box Page */
	/* Start:/bitrix/templates/bitrix24_2017/components/bitrix/menu/category.menu/menu-style.min.css?16538968237533*/
	.header-category-menu {
		display: flex;
		justify-content: center;
		position: relative;
		border-top: 1px solid #fff;
		box-sizing: border-box
	}

	.header-category-menu * {
		box-sizing: border-box
	}

	.header-category-menu .header-category-menu__outer {
		flex: 2 1 80%;
		width: 40%;
	}

	@media (max-width: 991.98px) {
		.header-category-menu .header-category-menu__body {
			position: absolute;
			width: 100%;
			height: 0;
			max-height: 200px;
			top: 100%;
			left: 0;
			box-sizing: border-box;
			overflow-y: auto;
			z-index: 4
		}
	}

	.header-category-menu .header-category-menu__inner.active .header-category-menu__body {
		height: auto
	}

	.header-category-menu .header-category-menu__list {
		/* max-width:1180px; */
		margin: 0 auto;
	}

	@media (max-width: 991.98px) {
		.header-category-menu .header-category-menu__list {
			background: #409eef;
		}
	}

	@media (min-width: 992px) {
		.header-category-menu .header-category-menu__list {
			flex-wrap: nowrap;
		}
	}

	.header-category-menu .header-category-menu-list:not(.glide) .header-category-menu-list__slides {
		display: flex;
		/* justify-content:space-around; */
		flex-direction: column;
		width: 100%;
	}

	@media (min-width: 992px) {
		.header-category-menu .header-category-menu-list:not(.glide) .header-category-menu-list__slides {
			flex-direction: row;
			flex-wrap: wrap;
		}
	}

	.header-category-menu .header-category-menu-list:not(.glide) .header-category-menu-list__slide {
		flex: 1
	}

	@media (min-width: 992px) {
		.header-category-menu .header-category-menu-item.active {
			background: #fff
		}
	}

	.header-category-menu .header-category-menu-item.active .header-category-menu-item__link {
		color: #fff
	}

	@media (min-width: 992px) {
		.header-category-menu .header-category-menu-item.active .header-category-menu-item__link {
			color: #262626
		}
	}

	.header-category-menu .header-category-menu-item__inner {
		display: flex;
		justify-content: center;
		align-items: center;
		flex: 1 0 auto;
		/* max-width:100%; */
		text-align: center;
	}

	.header-category-menu .header-category-menu-item__link {
		display: block;
		width: 100%;
		padding: 18px 15px 22px;
		color: #fff;
		font-size: 1rem;
		font-weight: 500;
		line-height: 1.8;
		white-space: nowrap
	}

	/* End */

	.bxst-section-cnt {
		max-width: 1210px;
		margin: 0 auto;
		padding: 0 15px;
		box-sizing: border-box
	}

	.bxst-text_center {
		text-align: center
	}

	.bxst-text_left {
		text-align: left
	}

	.bxst-text_right {
		text-align: right
	}

	.bxst-text_justify {
		text-align: justify
	}

	.bxst-text_primary-color {
		color: #00aeef
	}




	/* Start:/bitrix/templates/bitrix24_2017/css/price.table.min.css?167214290932347*/
	.bxst-prices-table_full-width {
		width: 100%;
		box-sizing: border-box
	}

	.bxst-prices-table__row {
		display: flex;
		justify-content: space-between;
		flex: 1 0 100%
	}

	.bxst-prices-table__sidebar,
	.bxst-prices-table__body {
		display: flex;
		flex-direction: row;
		box-sizing: border-box
	}

	.bxst-prices-table__sidebar {
		display: flex;
		flex-direction: column;
		flex: 1 0 100%;
		max-width: 230px;
		padding: 14px 14px 0 0;
		text-align: left
	}

	.bxst-prices-table__sidebar-title {
		margin-bottom: 17px;
		font-size: 1rem;
		font-weight: 500;
		line-height: 1.5
	}

	.bxst-prices-table__sidebar-description {
		color: #adb5bd;
		font-size: .75rem;
		font-weight: 400;
		line-height: 1.5
	}

	.bxst-prices-table__sidebar-description,
	.bxst-prices-table__sidebar-select {
		margin-top: 10px
	}

	.bxst-prices-table__row:first-child .bxst-prices-table__body {
		border: none
	}

	.bxst-prices-table__row:nth-child(2) .bxst-prices-table__body {
		border-top: 2px solid #dee2e6;
		border-radius: 8px 8px 0 0
	}

	.bxst-prices-table__row:last-child .bxst-prices-table__body {
		padding-bottom: 40px;
		border-bottom: 2px solid #dee2e6;
		border-radius: 0 0 8px 8px
	}

	.bxst-prices-table__row .bxst-prices-table__body {
		border-left: 2px solid #dee2e6;
		border-right: 2px solid #dee2e6
	}


	.bxst-prices-table__body-item {
		position: relative;
		flex: 1;
		text-align: center;
		padding: 10px
	}

	.bxst-prices-table__body-item .bx-ui-button {
		display: block;
		width: 100%;
		margin: auto
	}


	.bxst-prices-table__body-label_best {
		background-color: #51c99c
	}

	.bxst-prices-table__body-title {
		margin-bottom: 10px;
		font-size: 1.625rem;
		font-weight: 500;
		line-height: 1.5
	}

	.bxst-prices-table__body-content-value,
	.bxst-prices-table__body-description {
		font-size: .875rem;
		font-weight: 500;
		line-height: 1.5
	}

	.bxst-prices-table__body-description {
		font-size: .875rem
	}

	.bxst-prices-table__prices-outer {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		height: 100%;
		box-sizing: border-box
	}

	.bxst-prices-table__prices-inner {
		margin-top: 10px;
		box-sizing: border-box
	}

	.bxst-prices-table__prices-description {
		margin-top: 5px;
		color: #adb5bd;
		font-size: .875rem;
		font-weight: 500;
		line-height: 1.5
	}

	.bxst-prices-table__prices-value {
		margin: 5px 0;
		font-size: 1.35rem;
		font-weight: 600;
		line-height: 1;
		white-space: nowrap
	}

	.bxst-prices-table__prices-value span {
		font-size: 2rem
	}

	.bxst-prices-table__prices-value_base,
	.bxst-prices-table__prices-value_base span,
	.bxst-prices-table__prices_base {
		font-size: .875rem
	}

	.bxst-prices-table__prices-value_base,
	.bxst-prices-table__prices_base {
		color: #adb5bd;
		font-size: .875rem;
		font-weight: 500;
		line-height: 1;
		text-decoration: line-through;
		white-space: nowrap
	}

	.bxst-prices-table__prices_success {
		color: #b7db2a
	}

	.bxst-prices-table__prices_primary {
		color: #00aeef
	}

	.bxst-prices-table__prices_discount-label {
		display: inline-block;
		height: 1.75rem;
		color: #262626;
		padding: 0 10px;
		background-color: #bdf300;
		border-radius: .375rem;
		font-size: .875rem;
		font-weight: 500;
		line-height: 1.75;
		vertical-align: middle
	}

	.bxst-prices-table__pie-icon {
		position: relative;
		width: 22px;
		height: 22px;
		margin: auto;
		background-size: 20px;
		background-repeat: no-repeat;
		background-position: 50% 50%
	}


	.bxst-prices-table__extra-item {
		padding: 20px 14px;
		border-bottom: 1px solid #dee2e6
	}

	.bxst-prices-table__extra-item:last-child {
		border: none
	}

	.bxst-prices-table__extra-title {
		font-size: 1.125rem;
		line-height: 1.5
	}

	.bxst-prices-table__extra-description,
	.bxst-prices-table__extra-link-element {
		font-size: .875rem;
		line-height: 1.5
	}

	@media (max-width: 992px) {
		.bxst-prices-table:not(.bxst-prices-table-detail) {
			overflow-x: auto;
			-webkit-overflow-scrolling: touch
		}

		.bxst-prices-table__sidebar {
			position: -webkit-sticky;
			position: sticky;
			flex: 0;
			min-width: 150px;
			left: 0;
			background: #fff;
			border-right: 2px solid #dee2e6;
			z-index: 2
		}

		.bxst-prices-table__row:nth-child(2) .bxst-prices-table__body,
		.bxst-prices-table__row:last-child .bxst-prices-table__body {
			border-radius: 0
		}

		.bxst-prices-table__row .bxst-prices-table__body {
			border-left: none
		}

		.bxst-prices-table__body {
			flex: 1 0 100%;
			border-left: none;
			border-radius: 0
		}

		.bxst-prices-table-main .bxst-prices-table-sidebar {
			z-index: 2
		}
	}

	.bxst-prices-table-slim__row {
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 20px
	}

	.bxst-prices-table-slim__row_header {
		background-color: #e9ecef
	}

	.bxst-prices-table-slim__row:first-child {
		border-top: 2px solid #dee2e6;
		border-radius: 8px 8px 0 0
	}



	.bxst-prices-table-main-section .bxst-prices-primary-list-section_mt-0 {
		margin-top: 0
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list-section_mb-0 {
		margin-bottom: 0
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list-section-inner {
		max-width: 880px;
		margin: 0 auto;
		padding: 35px 15px;
		box-sizing: border-box
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list-title {
		color: #6c757d;
		font-size: 1.125rem;
		font-weight: 500;
		line-height: 1.5;
		margin-bottom: 15px
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list {
		display: flex;
		flex-wrap: wrap;
		margin: 0 auto;
		padding: 0;
		list-style: none
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list .bxst-prices-primary-list-item {
		flex: 1 0 40%;
		position: relative;
		padding-left: 15px;
		margin: 0 5% 20px 0;
		color: #6c757d;
		font-size: .9375rem;
		font-weight: 300;
		line-height: 1.5;
		box-sizing: border-box
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list .bxst-prices-primary-list-item:nth-child(2n) {
		margin-left: 5%;
		margin-right: 0
	}

	.bxst-prices-table-main-section .bxst-prices-primary-list .bxst-prices-primary-list-item:before {
		content: '';
		display: block;
		position: absolute;
		width: 7px;
		height: 7px;
		top: .3em;
		left: 0;
		background: #00aeef;
		border-radius: 100%
	}

	.bxst-prices-table {
		display: flex;
		flex-wrap: wrap;
		position: relative
	}

	.bxst-prices-table .bxst-prices-table-outer {
		display: flex;
		flex-wrap: wrap;
		flex: 1 0 100%;
		position: relative
	}

	.bxst-prices-table .bxst-prices-table-inner {
		width: 100%;
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-row {
		display: flex;
		justify-content: space-between;
		flex: 1 0 100%
	}

	.bxst-prices-table .bxst-prices-table-row-border .bxst-prices-table-body {
		border-left: 2px solid #dee2e6;
		border-right: 2px solid #dee2e6
	}

	.bxst-prices-table .bxst-prices-table-row-border:first-child .bxst-prices-table-body {
		border-top: 2px solid #dee2e6;
		border-radius: 8px 8px 0 0
	}

	.bxst-prices-table .bxst-prices-table-row-border:last-child .bxst-prices-table-body {
		border-bottom: 2px solid #dee2e6;
		border-radius: 0 0 8px 8px
	}

	.bxst-prices-table .bxst-prices-table-item {
		flex: 1 0 0;
		text-align: center
	}

	.bxst-prices-table .bxst-prices-table-sidebar,
	.bxst-prices-table .bxst-prices-table-body {
		display: flex;
		flex-direction: row
	}

	.bxst-prices-table .bxst-prices-table-body.bxst-prices-table-body_select {
		flex-direction: column
	}

	.bxst-prices-table .bxst-prices-table-body.bxst-prices-table-body_select .bxst-prices-table-item:not([data-sb-selected]) {
		display: none
	}

	.bxst-prices-table .bxst-prices-table-sidebar {
		flex: 1 0 100%;
		max-width: 265px;
		text-align: left
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-sidebar-title {
		color: #adb5bd;
		font-size: .75rem;
		letter-spacing: 1px
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-icon {
		display: flex;
		align-items: center;
		flex-wrap: wrap;
		padding: 12px 0;
		text-transform: uppercase
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-icon:before {
		content: '';
		display: block;
		width: 24px;
		height: 22px;
		margin-right: 8px
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-users:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-user.svg) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-business-users:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-business-user.svg) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-ssd:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-cloud.svg) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-features:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-key.svg) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-price {
		align-items: center
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-price:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-price.svg) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-extra {
		align-items: flex-start
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-extra:before {
		background: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNTEyIiBoZWlnaHQ9IjM4MiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMTczLjg5OCAzNzQuNDA0LTE2Ni40LTE2Ni40Yy05Ljk5Ny05Ljk5Ny05Ljk5Ny0yNi4yMDYgMC0zNi4yMDRsMzYuMjAzLTM2LjIwNGM5Ljk5Ny05Ljk5OCAyNi4yMDctOS45OTggMzYuMjA0IDBMMTkyIDI0Ny42OSA0MzIuMDk1IDcuNTk2YzkuOTk3LTkuOTk3IDI2LjIwNy05Ljk5NyAzNi4yMDQgMEw1MDQuNTAyIDQzLjhjOS45OTcgOS45OTcgOS45OTcgMjYuMjA2IDAgMzYuMjA0bC0yOTQuNCAyOTQuNDAxYy05Ljk5OCA5Ljk5Ny0yNi4yMDcgOS45OTctMzYuMjA0LS4wMDF6IiBmaWxsPSIjMkZDN0Y3Ii8+PC9zdmc+) no-repeat;
		background-size: contain
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-price-selection {
		flex: 1 0 100%;
		margin-top: 12px;
		margin-left: 30px;
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-sidebar .bxst-prices-table-sub-description {
		margin: 0 0 10px;
		padding: 0 55px 0 30px;
		color: #adb5bd;
		font-size: .75rem;
		line-height: 1.8;
		letter-spacing: 0;
		text-transform: none
	}

	.bxst-prices-table .bxst-prices-table-sidebar-column {
		-webkit-flex-direction: column;
		-ms-flex-direction: column;
		flex-direction: column
	}

	.bxst-prices-table .bxst-prices-table-sidebar-column-item {
		margin: 5px 5px 10px 0;
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-sidebar-column-item .bx-ui-button {
		width: 100%;
		padding-left: 10px;
		padding-right: 10px;
		overflow: hidden
	}

	.bxst-prices-table .bxst-prices-table-row-head .bxst-prices-table-body .bxst-prices-table-item {
		align-items: flex-start
	}

	.bxst-prices-table .bxst-prices-table-body {
		width: 100%;
		flex: 1 0 calc(100% - 265px);
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-body.bxst-prices-table-body-label:before {
		content: '';
		display: block;
		position: absolute;
		width: 87px;
		height: 89px
	}

	.bxst-prices-table .bxst-prices-table-body.bxst-prices-table-body-label.label-ru:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/bnn/crm-price-table-lable.svg) no-repeat
	}

	.bxst-prices-table .bxst-prices-table-body.bxst-prices-table-body-label.label-ua:before {
		background: url(/bitrix/templates/bitrix24_2017/css/../images/bnn/crm-price-table-lable-ua.svg) no-repeat
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-body-prices {
		position: relative
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-item {
		display: flex;
		align-items: center;
		justify-content: center;
		flex: 1;
		position: relative;
		min-width: 120px;
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-align-start {
		align-items: flex-start
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-item-bordered {
		margin: 5px 20px 0;
		border-top: 1px solid #dee2e6
	}



	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users,
	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content-value {
		display: flex;
		align-items: center;
		justify-content: center
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-count {
		padding: 5px 10px;
		border: 2px solid transparent;
		box-sizing: border-box;
		cursor: pointer
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-count.active {
		border: 2px solid #00aeef;
		border-radius: 30px
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content-outer {
		display: flex;
		flex-direction: column;
		align-items: center
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content-inner {
		display: flex;
		align-items: center;
		justify-content: center
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content-description {
		margin-top: 5px
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content {
		position: relative
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-content-link.bottom {
		position: absolute;
		left: -50%;
		right: -50%;
		top: calc(100% + 5px);
		margin: auto
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-link {
		display: block;
		color: #00aeef;
		font-size: .75rem;
		font-weight: 400;
		line-height: 1;
		cursor: pointer
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-users-link:hover {
		color: #00aeef
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-price-outer {
		padding: 23px 0 30px
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-price {
		flex: 1;
		padding: 5px 0 5px;
		font-size: 1.5rem;
		font-weight: 400;
		line-height: 1;
		text-transform: none;
		text-decoration: none
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-price.success {
		color: #b7db2a
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-prices-table-price.primary {
		color: #00aeef
	}



	.bxst-prices-table .bxst-prices-table-body .bxst-extra-list-item {
		display: flex;
		align-items: center;
		justify-content: center;
		color: #adb5bd;
		font-size: .875rem;
		font-weight: 300;
		line-height: 1.8
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-extra-list-item.success {
		color: #262626
	}

	.bxst-prices-table .bxst-prices-table-body .bxst-extra-list-item.success:after {
		content: '';
		display: block;
		margin-left: 5px;
		width: 11px;
		height: 15px;
		background: url(/bitrix/templates/bitrix24_2017/css/../images/icons/icon-checked.svg) no-repeat
	}

	.bxst-prices-table .bxst-prices-table-price-discount {
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 1.5rem;
		font-weight: 400;
		line-height: 1
	}

	.bxst-prices-table .bxst-prices-table-price-discount-value {
		white-space: nowrap
	}

	.bxst-prices-table .bxst-prices-table-price-discount-label {
		height: 24px;
		margin: 0 0 0 10px;
		padding: 0 10px;
		background-color: #bdf300;
		border-radius: 5px;
		font-size: .75rem;
		line-height: 2;
		vertical-align: middle
	}

	.bxst-prices-table .bxst-prices-table-price-discount-label.primary {
		background-color: #68ddff
	}

	.bxst-prices-table .bxst-header-site-selector-list .bxst-select-phantom-item-title {
		white-space: nowrap
	}

	.bxst-prices-table .bxst-prices-table-title {
		padding: 27px 5px 0;
		font-size: 1.5rem;
		font-weight: 400;
		line-height: 1
	}

	.bxst-prices-table .bxst-prices-table-title.bxst-prices-table-title_select {
		font-size: 1.2rem
	}

	.bxst-prices-table .bxst-prices-table-description {
		padding: 17px 30px 16px;
		color: #adb5bd;
		font-size: .75rem;
		font-weight: 400;
		line-height: 1.8;
		letter-spacing: -.5px
	}

	.bxst-prices-table .bxst-prices-table-switcher {
		display: flex;
		margin-top: 15px;
		margin-right: 15px
	}

	.bxst-prices-table .i-hover {
		display: block;
		position: absolute;
		height: 100%;
		left: 0;
		background: transparent;
		border: 2px solid #00aeef;
		border-radius: 5px;
		opacity: 0;
		transition: all 0.2s ease-in-out;
		box-sizing: border-box;
		z-index: 0
	}

	.bxst-prices-table .bxst-prices-table-arrow {
		display: none;
		flex: 1 0 100%;
		justify-content: flex-end;
		position: -webkit-sticky;
		position: sticky;
		left: 0;
		z-index: 2;
		box-sizing: border-box
	}

	.bxst-prices-table .bxst-prices-table-arrow-next,
	.bxst-prices-table .bxst-prices-table-arrow-prew {
		position: relative;
		width: 9px;
		height: 20px;
		margin: 0 30px;
		font-size: 0
	}

	.bxst-prices-table .bxst-prices-table-arrow-next:before,
	.bxst-prices-table .bxst-prices-table-arrow-next:after,
	.bxst-prices-table .bxst-prices-table-arrow-prew:before,
	.bxst-prices-table .bxst-prices-table-arrow-prew:after {
		content: '';
		display: block;
		position: absolute;
		width: 2px;
		height: 12px;
		background: #dee2e6;
		border-radius: 5px;
		transition: all 0.2s ease-in-out
	}

	.bxst-prices-table .bxst-prices-table-arrow-next:before,
	.bxst-prices-table .bxst-prices-table-arrow-prew:before {
		top: 0;
		transform: rotate(45deg)
	}

	.bxst-prices-table .bxst-prices-table-arrow-next:after,
	.bxst-prices-table .bxst-prices-table-arrow-prew:after {
		bottom: 0;
		transform: rotate(-45deg)
	}

	.bxst-prices-table .bxst-prices-table-arrow-prew {
		transform: rotate(180deg)
	}

	.bxst-prices-table .bxst-prices-table-stick {
		flex: 1 0 100%;
		width: 0;
		height: 0;
		overflow: hidden
	}

	.bxst-prices-table .bxst-prices-table-stick.bxst-sticked .bxst-prices-table-stick-outer {
		position: fixed
	}

	.bxst-prices-table .bxst-prices-table-stick-outer {
		display: flex;
		align-items: center;
		justify-content: space-around;
		width: 100%;
		top: 0;
		left: 0;
		margin: auto;
		padding: 0 15px;
		background: #e9ecef;
		box-shadow: 0 4px 10px -1px #adb5bd;
		box-sizing: border-box;
		z-index: 8
	}

	.bxst-prices-table .bxst-prices-table-stick-outer .bxst-prices-table-stick-inner {
		display: flex;
		align-items: center;
		justify-content: space-around;
		flex-wrap: wrap;
		max-width: 1210px;
		width: 100%;
		box-sizing: border-box
	}

	/* Start:/bitrix/content_vendors/bitrix24_ui/css/buttons.min.css?16525326443937*/
	.bx-ui-button {
		/* display:inline-block; */
		position: relative;
		padding: .5rem 1.25rem;
		border: none;
		border-radius: 30px;
		background-color: #dee2e6;
		color: #262626;
		font-family: inherit;
		font-size: .875rem;
		font-weight: 400;
		/* font-style:inherit; */
		/* line-height:1.5; */
		/* text-align:center; */
		text-transform: uppercase;
		text-decoration: none;
		/* box-sizing:border-box; */
		outline: none;
		vertical-align: middle;
		cursor: pointer
	}

	.bx-ui-button:hover,
	.bx-ui-button:focus,
	.bx-ui-button:active {
		transition: all 0.2s ease-in-out
	}

	.bx-ui-button:focus,
	.bx-ui-button:active {
		outline: none
	}

	.bx-ui-button * {
		box-sizing: border-box
	}

	.bx-ui-button:hover:not(.bx-ui-button_no-hover) {
		background-color: #e9ecef;
		color: #262626;
		text-decoration: none
	}

	.bx-ui-button[disabled] {
		opacity: 0.5 !important;
		cursor: default
	}

	.bx-ui-button_cursor-default,
	.bx-ui-button_cursor-default:hover {
		cursor: default
	}

	.bx-ui-button.bx-ui-button_xs {
		padding: .25rem .75rem
	}

	.bx-ui-button.bx-ui-button_sm {
		padding: .375rem 1rem
	}

	.bx-ui-button.bx-ui-button_md {
		padding: .5rem 1.25rem
	}

	.bx-ui-button.bx-ui-button_lg {
		/* padding:.75rem 1.5rem; */
	}

	.bx-ui-button.bx-ui-button_square {
		border-radius: .375rem
	}

	.bx-ui-button.bx-ui-button_primary {
		background-color: #00aeef;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_primary:hover:not(.bx-ui-button_no-hover) {
		background-color: #68ddff;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_primary_dark {
		background-color: rgba(104, 221, 255, 0.25);
		color: #262626;
		font-weight: 700
	}

	.bx-ui-button.bx-ui-button_primary_dark:hover:not(.bx-ui-button_no-hover) {
		background-color: rgba(104, 221, 255, 0.25);
		color: #262626;
		opacity: .75
	}

	.bx-ui-button.bx-ui-button_success {
		background-color: #b7db2a;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_success:hover:not(.bx-ui-button_no-hover) {
		background-color: #bdf300;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_success_dark {
		/* background-color:#bdf300; */
		/* color:#262626; */
		/* font-weight:700; */
	}

	.bx-ui-button.bx-ui-button_success_dark:hover:not(.bx-ui-button_no-hover) {
		background-color: #bdf300;
		color: #262626;
		opacity: .75
	}

	.bx-ui-button.bx-ui-button_warning {
		background-color: #f7a700;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_warning:hover:not(.bx-ui-button_no-hover) {
		background-color: #fbc048;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_danger {
		background-color: #c82333;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_danger:hover:not(.bx-ui-button_no-hover) {
		background-color: #ec7063;
		color: #fff
	}

	.bx-ui-button.bx-ui-button_border,
	.bx-ui-button.bx-ui-button_primary-border,
	.bx-ui-button.bx-ui-button_primary-border_dark,
	.bx-ui-button.bx-ui-button_success-border,
	.bx-ui-button.bx-ui-button_warning-border,
	.bx-ui-button.bx-ui-button_danger-border {
		background-color: transparent;
		border: 2px solid
	}

	.bx-ui-button.bx-ui-button_border:hover:not(.bx-ui-button_no-hover),
	.bx-ui-button.bx-ui-button_primary-border:hover:not(.bx-ui-button_no-hover),
	.bx-ui-button.bx-ui-button_primary-border_dark:hover:not(.bx-ui-button_no-hover),
	.bx-ui-button.bx-ui-button_success-border:hover:not(.bx-ui-button_no-hover),
	.bx-ui-button.bx-ui-button_warning-border:hover:not(.bx-ui-button_no-hover),
	.bx-ui-button.bx-ui-button_danger-border:hover:not(.bx-ui-button_no-hover) {
		background-color: transparent
	}

	.bx-ui-button.bx-ui-button_border {
		color: #ced4da
	}

	.bx-ui-button.bx-ui-button_border:hover:not(.bx-ui-button_no-hover) {
		color: #ced4da
	}

	.bx-ui-button.bx-ui-button_primary-border {
		color: #00aeef
	}

	.bx-ui-button.bx-ui-button_primary-border:hover:not(.bx-ui-button_no-hover) {
		color: #68ddff
	}

	.bx-ui-button.bx-ui-button_primary-border_dark {
		border-color: #00aeef;
		color: #262626
	}

	.bx-ui-button.bx-ui-button_primary-border_dark:hover:not(.bx-ui-button_no-hover) {
		border-color: #00aeef;
		color: #262626;
		opacity: .75
	}

	.bx-ui-button.bx-ui-button_success-border {
		color: #b7db2a
	}

	.bx-ui-button.bx-ui-button_success-border:hover:not(.bx-ui-button_no-hover) {
		color: #bdf300
	}

	.bx-ui-button.bx-ui-button_warning-border {
		color: #f7a700
	}

	.bx-ui-button.bx-ui-button_warning-border:hover:not(.bx-ui-button_no-hover) {
		color: #fbc048
	}

	.bx-ui-button.bx-ui-button_danger-border {
		color: #c82333
	}

	.bx-ui-button.bx-ui-button_danger-border:hover:not(.bx-ui-button_no-hover) {
		color: #ec7063
	}

	.tab-container {
		display: flex;
		border: 2px solid red;
		border-radius: 10px;
		overflow: hidden;
		width: 200px;
		/* ширина блока табов */
	}

	.flex1 {
		flex: 1;
	}

	.tab {
		text-align: center;
		padding: 10px 0;
		cursor: pointer;
		font-family: Arial, sans-serif;
		font-size: 16px;
		color: red;
		/* граница между табами */
		transition: background-color 0.3s, color 0.3s;
	}

	.tab:last-child {
		border-right: none;
		/* убираем границу у последнего таба */
	}

	.active {
		background-color: red;
		color: white;
		border-radius: 8px;
	}

	.tab:hover {
		background-color: rgba(255, 0, 0, 0.1);
		/* эффект при наведении */
	}

	/* End */
</style>
<div class="body-content m60">
	<div class="body-wrap bxst-main-wrapp">
		<div class="main-page  " style="padding-top: 50px;">
			<div class="bx-sb-b24-price-table bx-sb-b24-price-table_prices bx-sb-b24-price-table_count_5"
				data-sb-b24-price-table="">
				<div class="bx-sb-b24-price-table__outer">
					<div class="bx-sb-b24-price-table__inner" data-sb-b24-price-table-inner="">
						<div class="bx-sb-b24-price-table__prologue">
							<div class="bx-sb-b24-price-table-prologue justify-content-center">
								<div class="bx-sb-b24-price-table-prologue__section">
									<div class="bx-sb-b24-price-table-selector flex-column">
										<div class="bx-sb-b24-price-table-selector__description">
											<div class="bx-sb-b24-price-table-selector__message bold30 m45">Цена за
												месяц при
												покупке на<br><a href="https://www.bitrix24.kz/prices/cloud_base.php"
													class="bold30">Скидки</a> для
												клиентов архивных тарифов</div>
										</div>

										<!-- <div class="bx-sb-b24-price-table-selector__select">
											<div class="bx-sb-b24-price-table__select">

												<select id="selectid" onchange="jsfunc1()"
													class="bx-sb-b24-price-table-select bx-sb-b24-price-table-select_blue"
													data-sb-select="{&quot;options&quot;:[{&quot;message&quot;:&quot;\u043d\u0430 1 \u043c\u0435\u0441\u044f\u0446&quot;},{&quot;message&quot;:&quot;\u043d\u0430 3 \u043c\u0435\u0441\u044f\u0446\u0430&quot;},{&quot;message&quot;:&quot;\u043d\u0430 \u0433\u043e\u0434\u003Cspan\u003E-20%\u003C\/span\u003E&quot;}]}"
													data-sb-select-initialized="true">
													<option class="opt" id="valid1" value="val1">на 1 месяц</option>
													<option class="opt" id="valid2" value="val2">на 3 месяца</option>
													<option class="opt" id="valid3" value="val3" selected="">на год
													</option>
												</select>
											</div>
										</div> -->
										<div class="tab-container">
											<div class="tab flex1" id="tab-month" onclick="selectTab('month')">
												на месяц
											</div>
											<div class="tab flex1 active" id="tab-year" onclick="selectTab('year')">
												на год
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="bx-sb-b24-price-table__content">
						<div class="bx-sb-b24-price-table__columns bx-sb-b24-price-table__columns_col"
							data-sb-runner-area="" data-sb-columns="">
							<div class="bx-sb-b24-price-table__column bx-sb-b24-price-table__column_col bx-sb-b24-price-table__column_round bx-sb-b24-price-table__column_green"
								data-sb-column="PROJECT">
								<div class="bx-sb-b24-price-table__background">
									<div class="bx-sb-b24-price-table__header">
										<div class="bx-sb-b24-price-table-header">
											<div class="bx-sb-b24-price-table-header__title">Бесплатный</div>
											<div class="bx-sb-b24-price-table-header__description">Начните работать
												онлайн и продавать больше с CRM</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__user">
										<div class="bx-sb-b24-price-table-user">
											<div class="bx-sb-b24-price-table-user__content">
												<div class="bx-sb-b24-price-table-user__container">
													<div class="bx-sb-b24-price-table-user__select">
														<div
															class="bx-sb-b24-price-table-user__icon bx-sb-b24-price-table-user__icon_fire bx-sb-b24-price-table-user__icon_fire_unlimited">
														</div>
														<div
															class="bx-sb-b24-price-table-user__message bx-sb-b24-price-table-user__message_unlimited">
															неограниченно</div>
													</div>
													<div class="bx-sb-b24-price-table-user__message">пользователей
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-user__epilogue">
												<a href="https://unlimited.bitrix24.tech/"
													class="bx-sb-b24-price-table-user__more" target="_blank"
													data-sb-side-panel="https://unlimited.bitrix24.tech/">узнать
													больше</a>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__price">
										<div
											class="bx-sb-b24-price-table-price bx-sb-b24-price-table-price_description">
											<div
												class="bx-sb-b24-price-table-price__content bx-sb-b24-price-table-price__content_selected">
												<div class="bx-sb-b24-price-table-price__message">Бесплатно</div>
											</div>
											<div class="bx-sb-b24-price-table-price__description"></div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__order">
										<div class="bx-sb-b24-price-table-order">
											<div
												class="bx-sb-b24-price-table-order__content bx-sb-b24-price-table-order__content_selected">
												<a data-sb-order-button="" href="https://ltm.studio/"
													class=" no-line"><span
														class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button">создать</span></a>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__storage">
										<div class="bx-sb-b24-price-table-storage">
											<div class="bx-sb-b24-price-table-storage__content" data-sb-selected="true">
												<div class="bx-sb-b24-price-table-storage__value">5 Гб</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__supply">
										<div class="bx-sb-b24-price-table-supply" data-sb-runner-section="">
											<div class="bx-sb-b24-price-table-supply__inner">
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="COLLABORATION/PROJECT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0432\u043c\u0435\u0441\u0442\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430&quot;}"
																	data-sb-title-initialized="true">Совместная
																	работа </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Совместная работа</div>
																</div>
															</div>
														</div>
														<div class="bx-sb-b24-price-table-supply__list">
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0427\u0430\u0442&quot;}"
																		data-sb-title-initialized="true">
																		Чат </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Чат</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0412\u0438\u0434\u0435\u043e\u0437\u0432\u043e\u043d\u043a\u0438 HD&quot;}"
																		data-sb-title-initialized="true">
																		Видеозвонки HD </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Видеозвонки HD</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u0430\u043b\u0435\u043d\u0434\u0430\u0440\u044c&quot;}"
																		data-sb-title-initialized="true">
																		Календарь </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Календарь</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="HR/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0446\u0441\u0435\u0442\u044c \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Соцсеть компании </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Соцсеть компании</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Новости </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Новости</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PROJECT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0411\u0430\u0437\u0430 \u0437\u043d\u0430\u043d\u0438\u0439&quot;}"
																		data-sb-title-initialized="true">
																		База знаний </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			База знаний</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="TASKS_AND_PROJECTS/PROJECT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0417\u0430\u0434\u0430\u0447\u0438 \u0438 \u041f\u0440\u043e\u0435\u043a\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Задачи и
																	Проекты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Задачи и Проекты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CRM/PROJECT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;CRM&quot;}"
																	data-sb-title-initialized="true">CRM </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		CRM</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="STORAGE/PROJECT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u0438\u0441\u043a&quot;}"
																	data-sb-title-initialized="true">Диск </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Диск</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CONTACT_CENTER/PROJECT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442-\u0446\u0435\u043d\u0442\u0440&quot;}"
																	data-sb-title-initialized="true">Контакт-центр
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Контакт-центр</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="SITES_AND_LANDINGS/PROJECT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u0430\u0439\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Сайты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сайты</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="bx-sb-b24-price-table-supply__section">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="bx-sb-b24-price-table__column bx-sb-b24-price-table__column_col bx-sb-b24-price-table__column_round"
								data-sb-column="BASIC">
								<div class="bx-sb-b24-price-table__background">
									<div class="bx-sb-b24-price-table__header">
										<div class="bx-sb-b24-price-table-header">
											<div class="bx-sb-b24-price-table-header__title">Базовый</div>
											<div class="bx-sb-b24-price-table-header__description">Для эффективной
												работы небольших компаний и отделов продаж</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__user tab">
										<div class="bx-sb-b24-price-table-user">
											<div class="bx-sb-b24-price-table-user__content">
												<div class="bx-sb-b24-price-table-user__container">
													<div class="bx-sb-b24-price-table-user__select">
														<div id="demo"
															class="bx-sb-b24-price-table-user__value bx-sb-b24-price-table-user__value_select">
															5</div>
													</div>
													<div class="bx-sb-b24-price-table-user__message">пользователей</div>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__price">
										<div
											class="bx-sb-b24-price-table-price bx-sb-b24-price-table-price_description">
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>12 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>12 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__base"
														style="padding-bottom: 7px;">830 TM.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span id="base">665</span>
															TM.
														</div>
														<div id="percent" class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__epilogue">
												<div class="bx-sb-b24-price-table-price__description">за всех
													пользователей</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__order">
										<div class="bx-sb-b24-price-table-order">
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:[&quot;1&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;BASIC&quot;}">
													<span id="portal-buy-button-tooltipa2b9c2ceacdb6e5a3eb5ac15f82800a0"
														class="portal-buy-button-tooltip">
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:[&quot;3&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;BASIC&quot;}">
													<span id="portal-buy-button-tooltip5ec535d8c9a46adb6e2ccd8455b5709e"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip5ec535d8c9a46adb6e2ccd8455b5709e'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip5ec535d8c9a46adb6e2ccd8455b5709e'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;BASIC&quot;,&quot;option&quot;:[&quot;12&quot;]}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;BASIC&quot;}">
													<span id="portal-buy-button-tooltip7f6177617df805e82ba48be1f55d2b84"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip7f6177617df805e82ba48be1f55d2b84'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip7f6177617df805e82ba48be1f55d2b84'-->
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__storage">
										<div class="bx-sb-b24-price-table-storage">
											<div class="bx-sb-b24-price-table-storage__content" data-sb-selected="true">
												<div class="bx-sb-b24-price-table-storage__value">24 Гб</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__supply">
										<div class="bx-sb-b24-price-table-supply" data-sb-runner-section="">
											<div class="bx-sb-b24-price-table-supply__inner">
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="COLLABORATION/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0432\u043c\u0435\u0441\u0442\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430&quot;}"
																	data-sb-title-initialized="true">Совместная
																	работа </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Совместная работа</div>
																</div>
															</div>
														</div>
														<div class="bx-sb-b24-price-table-supply__list">
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/BASIC"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0427\u0430\u0442&quot;}"
																		data-sb-title-initialized="true">
																		Чат </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Чат</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/BASIC"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0412\u0438\u0434\u0435\u043e\u0437\u0432\u043e\u043d\u043a\u0438 HD&quot;}"
																		data-sb-title-initialized="true">
																		Видеозвонки HD </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Видеозвонки HD</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/BASIC"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u0430\u043b\u0435\u043d\u0434\u0430\u0440\u044c&quot;}"
																		data-sb-title-initialized="true">
																		Календарь </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Календарь</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="HR/BASIC" data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0446\u0441\u0435\u0442\u044c \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Соцсеть компании </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Соцсеть компании</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/BASIC"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Новости </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Новости</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/BASIC"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0411\u0430\u0437\u0430 \u0437\u043d\u0430\u043d\u0438\u0439&quot;}"
																		data-sb-title-initialized="true">
																		База знаний </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			База знаний</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="TASKS_AND_PROJECTS/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0417\u0430\u0434\u0430\u0447\u0438 \u0438 \u041f\u0440\u043e\u0435\u043a\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Задачи и
																	Проекты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Задачи и Проекты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CRM/BASIC" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;CRM&quot;}"
																	data-sb-title-initialized="true">CRM </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		CRM</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="STORAGE/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u0438\u0441\u043a&quot;}"
																	data-sb-title-initialized="true">Диск </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Диск</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CONTACT_CENTER/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442-\u0446\u0435\u043d\u0442\u0440&quot;}"
																	data-sb-title-initialized="true">Контакт-центр
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Контакт-центр</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="SITES_AND_LANDINGS/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u0430\u0439\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Сайты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сайты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_SHOP/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0418\u043d\u0442\u0435\u0440\u043d\u0435\u0442-\u043c\u0430\u0433\u0430\u0437\u0438\u043d&quot;}"
																	data-sb-title-initialized="true">
																	Интернет-магазин </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Интернет-магазин</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HELPDESK/BASIC"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-1"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041f\u043e\u0434\u0434\u0435\u0440\u0436\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Поддержка</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Поддержка</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="bx-sb-b24-price-table__column bx-sb-b24-price-table__column_col bx-sb-b24-price-table__column_round"
								data-sb-column="STD">
								<div class="bx-sb-b24-price-table__background">
									<div class="bx-sb-b24-price-table__header">
										<div class="bx-sb-b24-price-table-header">
											<div class="bx-sb-b24-price-table-header__title">Стандартный</div>
											<div class="bx-sb-b24-price-table-header__description">Для совместной
												работы всей компании или рабочих групп</div>
										</div>
									</div>

									<div class="bx-sb-b24-price-table__user tab">
										<div class="bx-sb-b24-price-table-user">
											<div class="bx-sb-b24-price-table-user__content">
												<div class="bx-sb-b24-price-table-user__container">
													<div class="bx-sb-b24-price-table-user__select">
														<div id="demo2"
															class="bx-sb-b24-price-table-user__value bx-sb-b24-price-table-user__value_select">
															50</div>
													</div>
													<div class="bx-sb-b24-price-table-user__message">пользователей</div>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__price">
										<div
											class="bx-sb-b24-price-table-price bx-sb-b24-price-table-price_description">
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>34 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>34 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__base"
														style="padding-bottom: 7px;">2 330TM.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span id="stand">1 865</span>
															TM.</div>
														<div id="percent2"
															class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__epilogue">
												<div class="bx-sb-b24-price-table-price__description">за всех
													пользователей</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__order">
										<div class="bx-sb-b24-price-table-order">
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:[&quot;1&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;STD&quot;}"><span
														id="portal-buy-button-tooltip580882da99ba95a6559d48fe561ff572"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip580882da99ba95a6559d48fe561ff572'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip580882da99ba95a6559d48fe561ff572'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:[&quot;3&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;STD&quot;}"><span
														id="portal-buy-button-tooltipc24e7b81a0700569d8823d892320cae8"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipc24e7b81a0700569d8823d892320cae8'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipc24e7b81a0700569d8823d892320cae8'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;STD&quot;,&quot;option&quot;:[&quot;12&quot;]}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;STD&quot;}"><span
														id="portal-buy-button-tooltipc91e847b030f3d7362f835cc41cb9a8e"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipc91e847b030f3d7362f835cc41cb9a8e'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipc91e847b030f3d7362f835cc41cb9a8e'-->
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__storage">
										<div class="bx-sb-b24-price-table-storage">
											<div class="bx-sb-b24-price-table-storage__content" data-sb-selected="true">
												<div class="bx-sb-b24-price-table-storage__value">100 Гб</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__supply">
										<div class="bx-sb-b24-price-table-supply" data-sb-runner-section="">
											<div class="bx-sb-b24-price-table-supply__inner">
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="COLLABORATION/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0432\u043c\u0435\u0441\u0442\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430&quot;}"
																	data-sb-title-initialized="true">Совместная
																	работа </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Совместная работа</div>
																</div>
															</div>
														</div>
														<div class="bx-sb-b24-price-table-supply__list">
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/STD"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0427\u0430\u0442&quot;}"
																		data-sb-title-initialized="true">
																		Чат </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Чат</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/STD"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0412\u0438\u0434\u0435\u043e\u0437\u0432\u043e\u043d\u043a\u0438 HD&quot;}"
																		data-sb-title-initialized="true">
																		Видеозвонки HD </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Видеозвонки HD</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/STD"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u0430\u043b\u0435\u043d\u0434\u0430\u0440\u044c&quot;}"
																		data-sb-title-initialized="true">
																		Календарь </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Календарь</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="HR/STD" data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0446\u0441\u0435\u0442\u044c \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Соцсеть компании </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Соцсеть компании</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/STD"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Новости </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Новости</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/STD"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0411\u0430\u0437\u0430 \u0437\u043d\u0430\u043d\u0438\u0439&quot;}"
																		data-sb-title-initialized="true">
																		База знаний </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			База знаний</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="TASKS_AND_PROJECTS/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0417\u0430\u0434\u0430\u0447\u0438 \u0438 \u041f\u0440\u043e\u0435\u043a\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Задачи и
																	Проекты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Задачи и Проекты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CRM/STD" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;CRM&quot;}"
																	data-sb-title-initialized="true">CRM </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		CRM</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="STORAGE/STD" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u0438\u0441\u043a&quot;}"
																	data-sb-title-initialized="true">Диск </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Диск</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CONTACT_CENTER/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442-\u0446\u0435\u043d\u0442\u0440&quot;}"
																	data-sb-title-initialized="true">Контакт-центр
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Контакт-центр</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="SITES_AND_LANDINGS/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u0430\u0439\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Сайты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сайты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_SHOP/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0418\u043d\u0442\u0435\u0440\u043d\u0435\u0442-\u043c\u0430\u0433\u0430\u0437\u0438\u043d&quot;}"
																	data-sb-title-initialized="true">
																	Интернет-магазин </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Интернет-магазин</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="MARKETING/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041c\u0430\u0440\u043a\u0435\u0442\u0438\u043d\u0433&quot;}"
																	data-sb-title-initialized="true">Маркетинг
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Маркетинг</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_DOCUMENTS/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u043e\u043a\u0443\u043c\u0435\u043d\u0442\u044b \u041e\u043d\u043b\u0430\u0439\u043d&quot;}"
																	data-sb-title-initialized="true">Документы
																	Онлайн </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Документы Онлайн</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HELPDESK/STD" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041f\u043e\u0434\u0434\u0435\u0440\u0436\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Поддержка</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Поддержка</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ADMINISTRATION/STD"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0410\u0434\u043c\u0438\u043d\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435&quot;}"
																	data-sb-title-initialized="true">
																	Администрирование</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Администрирование</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="bx-sb-b24-price-table__column bx-sb-b24-price-table__column_col bx-sb-b24-price-table__column_round"
								data-sb-column="PRO100">
								<div class="bx-sb-b24-price-table__background">
									<div class="bx-sb-b24-price-table__header">
										<div class="bx-sb-b24-price-table-header">
											<div class="bx-sb-b24-price-table-header__title">Профессиональный</div>
											<div class="bx-sb-b24-price-table-header__description">Для максимальной
												автоматизации всех процессов в компании</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__user tab">
										<div class="bx-sb-b24-price-table-user">
											<div class="bx-sb-b24-price-table-user__content">
												<div class="bx-sb-b24-price-table-user__container">
													<div class="bx-sb-b24-price-table-user__select">
														<div
															class="bx-sb-b24-price-table-user__icon bx-sb-b24-price-table-user__icon_fire">
														</div>
														<div id="demo3"
															class="bx-sb-b24-price-table-user__value bx-sb-b24-price-table-user__value_select">
															100</div>
													</div>
													<div class="bx-sb-b24-price-table-user__message">пользователей
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__price">
										<div
											class="bx-sb-b24-price-table-price bx-sb-b24-price-table-price_description">
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>68 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>68 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__base"
														style="padding-bottom: 7px;">4 665 TM.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span id="pro">3 730</span>
															TM.</div>
														<div id="percent3"
															class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__epilogue">
												<div class="bx-sb-b24-price-table-price__description">за всех
													пользователей</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__order">
										<div class="bx-sb-b24-price-table-order">
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:[&quot;1&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;PRO100&quot;}">
													<span id="portal-buy-button-tooltip5644b2dca7c575902d93ac606a8199ec"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip5644b2dca7c575902d93ac606a8199ec'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip5644b2dca7c575902d93ac606a8199ec'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:[&quot;3&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;PRO100&quot;}">
													<span id="portal-buy-button-tooltip4865e2bf7a9b88629cd5cace5d4bed88"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip4865e2bf7a9b88629cd5cace5d4bed88'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip4865e2bf7a9b88629cd5cace5d4bed88'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;PRO100&quot;,&quot;option&quot;:[&quot;12&quot;]}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;PRO100&quot;}">
													<span id="portal-buy-button-tooltip8e6179a7a5ecbc2412e242bb6e8b8a21"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip8e6179a7a5ecbc2412e242bb6e8b8a21'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button no-line"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip8e6179a7a5ecbc2412e242bb6e8b8a21'-->
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__storage">
										<div class="bx-sb-b24-price-table-storage">
											<div class="bx-sb-b24-price-table-storage__content" data-sb-selected="true">
												<div class="bx-sb-b24-price-table-storage__value">1 024 Гб</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__supply">
										<div class="bx-sb-b24-price-table-supply" data-sb-runner-section="">
											<div class="bx-sb-b24-price-table-supply__inner">
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="COLLABORATION/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0432\u043c\u0435\u0441\u0442\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430&quot;}"
																	data-sb-title-initialized="true">Совместная
																	работа </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Совместная работа</div>
																</div>
															</div>
														</div>
														<div class="bx-sb-b24-price-table-supply__list">
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0427\u0430\u0442&quot;}"
																		data-sb-title-initialized="true">
																		Чат </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Чат</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0412\u0438\u0434\u0435\u043e\u0437\u0432\u043e\u043d\u043a\u0438 HD&quot;}"
																		data-sb-title-initialized="true">
																		Видеозвонки HD </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Видеозвонки HD</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u0430\u043b\u0435\u043d\u0434\u0430\u0440\u044c&quot;}"
																		data-sb-title-initialized="true">
																		Календарь </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Календарь</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="HR/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0446\u0441\u0435\u0442\u044c \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Соцсеть компании </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Соцсеть компании</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Новости </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Новости</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/PRO100"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0411\u0430\u0437\u0430 \u0437\u043d\u0430\u043d\u0438\u0439&quot;}"
																		data-sb-title-initialized="true">
																		База знаний </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			База знаний</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="TASKS_AND_PROJECTS/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0417\u0430\u0434\u0430\u0447\u0438 \u0438 \u041f\u0440\u043e\u0435\u043a\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Задачи и
																	Проекты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Задачи и Проекты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CRM/PRO100" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;CRM&quot;}"
																	data-sb-title-initialized="true">CRM </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		CRM</div>
																</div>
															</div>
															<!-- <a class="bx-sb-b24-price-table-supply__label bx-sb-b24-price-table-supply__label_icon bx-sb-b24-price-table-supply__label_crm"
																href="https://crm1.bitrix24.ru/" target="_blank"
																data-sb-side-panel="https://crm1.bitrix24.ru/">CRM
																№1</a> -->
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="STORAGE/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u0438\u0441\u043a&quot;}"
																	data-sb-title-initialized="true">Диск </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Диск</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CONTACT_CENTER/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442-\u0446\u0435\u043d\u0442\u0440&quot;}"
																	data-sb-title-initialized="true">Контакт-центр
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Контакт-центр</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="SITES_AND_LANDINGS/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u0430\u0439\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Сайты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сайты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_SHOP/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0418\u043d\u0442\u0435\u0440\u043d\u0435\u0442-\u043c\u0430\u0433\u0430\u0437\u0438\u043d&quot;}"
																	data-sb-title-initialized="true">
																	Интернет-магазин </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Интернет-магазин</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="MARKETING/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041c\u0430\u0440\u043a\u0435\u0442\u0438\u043d\u0433&quot;}"
																	data-sb-title-initialized="true">Маркетинг
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Маркетинг</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_DOCUMENTS/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u043e\u043a\u0443\u043c\u0435\u043d\u0442\u044b \u041e\u043d\u043b\u0430\u0439\u043d&quot;}"
																	data-sb-title-initialized="true">Документы
																	Онлайн </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Документы Онлайн</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ANALYTICS/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043a\u0432\u043e\u0437\u043d\u0430\u044f \u0430\u043d\u0430\u043b\u0438\u0442\u0438\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Сквозная
																	аналитика </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сквозная аналитика</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="BUSINESS_AUTOMATION/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0410\u0432\u0442\u043e\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u044f&quot;}"
																	data-sb-title-initialized="true">Автоматизация
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Автоматизация</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HR/PRO100" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;HR&quot;}"
																	data-sb-title-initialized="true">HR </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		HR</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HELPDESK/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041f\u043e\u0434\u0434\u0435\u0440\u0436\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Поддержка</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Поддержка</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ADMINISTRATION/PRO100"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-2"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0410\u0434\u043c\u0438\u043d\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435&quot;}"
																	data-sb-title-initialized="true">
																	Администрирование</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Администрирование</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="bx-sb-b24-price-table__column bx-sb-b24-price-table__column_col bx-sb-b24-price-table__column_round bx-sb-b24-price-table__column_aquamarine"
								data-sb-column="ENT">
								<div class="bx-sb-b24-price-table__background">
									<div class="bx-sb-b24-price-table__header">
										<div class="bx-sb-b24-price-table-header">
											<div class="bx-sb-b24-price-table-header__title">Энтерпрайз</div>
											<div class="bx-sb-b24-price-table-header__description">Для цифровизации
												крупного и среднего бизнеса на максимальных скоростях</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__user tab">
										<div class="bx-sb-b24-price-table-user">
											<div class="bx-sb-b24-price-table-user__content">

												<div class="">
													<button class="btn4" id="btn4">
														<div class="bx-sb-b24-price-table-user__container">
															<div class="bx-sb-b24-price-table-user__select">
																<div id="demo4"
																	class="bx-sb-b24-price-table-user__value bx-sb-b24-price-table-user__value_select">
																	250</div>
															</div>
															<div class="bx-sb-b24-price-table-user__message">
																пользователей
															</div>
														</div>
														<i class="bx bx-chevron-down" id="arrow4"></i>
													</button>
													<div class="dropdown4" id="dropdown4">
														<ul>
															<li onclick="myValue2()" id="myOpt2" value="250">250
																пользователей</li>
															<li onclick="myValue3()" id="myOpt3" value="500">500
																пользователей</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="bx-sb-b24-price-table__price">
										<div
											class="bx-sb-b24-price-table-price bx-sb-b24-price-table-price_description">
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;users&quot;:&quot;250&quot;}"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>170 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;users&quot;:&quot;250&quot;}"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>170 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;users&quot;:&quot;250&quot;}"
													data-sb-selected="true">
													<div class="bx-sb-b24-price-table-price__base"
														style="padding-bottom: 5px; padding-top: 5px;">11 330 TM.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span id="enter">9 070</span>
															TM.</div>
														<div id="percent4"
															class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;users&quot;:&quot;500&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>288 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;users&quot;:&quot;500&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>288 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;users&quot;:&quot;500&quot;}">
													<div class="bx-sb-b24-price-table-price__base">288 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>230 400</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;users&quot;:&quot;1000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>480 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;users&quot;:&quot;1000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>480 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;users&quot;:&quot;1000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">480 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>384 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;users&quot;:&quot;2000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>960 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;users&quot;:&quot;2000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>960 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;users&quot;:&quot;2000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">960 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>768 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;users&quot;:&quot;3000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;users&quot;:&quot;3000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;users&quot;:&quot;3000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">1 400 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 120 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;users&quot;:&quot;4000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 900 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;users&quot;:&quot;4000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 900 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;users&quot;:&quot;4000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">1 900 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 520 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;users&quot;:&quot;5000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;users&quot;:&quot;5000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;users&quot;:&quot;5000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">2 400 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>1 920 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;users&quot;:&quot;6000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 900 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;users&quot;:&quot;6000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 900 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;users&quot;:&quot;6000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">2 900 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 320 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;users&quot;:&quot;7000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;users&quot;:&quot;7000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;users&quot;:&quot;7000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">3 400 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>2 720 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;users&quot;:&quot;8000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 800 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;users&quot;:&quot;8000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 800 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;users&quot;:&quot;8000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">3 800 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 040 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;users&quot;:&quot;9000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>4 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;users&quot;:&quot;9000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>4 400 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;users&quot;:&quot;9000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">4 400 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 520 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;option&quot;:1}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;users&quot;:&quot;10000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>4 800 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;option&quot;:3}">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;users&quot;:&quot;10000&quot;}">
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>4 800 000</span>
															₸/мес.</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;option&quot;:12}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-price__content"
													data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;users&quot;:&quot;10000&quot;}">
													<div class="bx-sb-b24-price-table-price__base">4 800 000 ₸/мес.
													</div>
													<div class="bx-sb-b24-price-table-price__current">
														<div class="bx-sb-b24-price-table-price__value"
															data-sb-price-marker-entity=""><span>3 840 000</span>
															₸/мес.</div>
														<div class="bx-sb-b24-price-table-price__discount">
															<div class="bx-sb-b24-price-table-price__discount-value">
																-20%</div>
														</div>
													</div>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-price__epilogue">
												<div class="bx-sb-b24-price-table-price__description">за всех
													пользователей</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__order">
										<div class="bx-sb-b24-price-table-order">
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT&quot;,&quot;option&quot;:[&quot;1&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT250&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT250&quot;],&quot;users&quot;:[250]}"
													data-sb-selected="true"><span
														id="portal-buy-button-tooltipc1d082b112b8607f4e12adbe65a0392d"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipc1d082b112b8607f4e12adbe65a0392d'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipc1d082b112b8607f4e12adbe65a0392d'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT500&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT500&quot;],&quot;users&quot;:[500]}">
													<span id="portal-buy-button-tooltip4d48eba62cffd7a8ae867a15cc3bacf8"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip4d48eba62cffd7a8ae867a15cc3bacf8'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip4d48eba62cffd7a8ae867a15cc3bacf8'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT1000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT1000&quot;],&quot;users&quot;:[1000]}">
													<span id="portal-buy-button-tooltip32d031e11b1f45a50e78b90e5db7c220"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip32d031e11b1f45a50e78b90e5db7c220'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip32d031e11b1f45a50e78b90e5db7c220'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT2000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT2000&quot;],&quot;users&quot;:[2000]}">
													<span id="portal-buy-button-tooltip290e971d814ee843b8eecc96ab507003"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip290e971d814ee843b8eecc96ab507003'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip290e971d814ee843b8eecc96ab507003'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT3000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT3000&quot;],&quot;users&quot;:[3000]}">
													<span id="portal-buy-button-tooltip12763e553b774a005965c10edf30b83d"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip12763e553b774a005965c10edf30b83d'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip12763e553b774a005965c10edf30b83d'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT4000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT4000&quot;],&quot;users&quot;:[4000]}">
													<span id="portal-buy-button-tooltip4e296577d7ce1ea0af75a29549cd06bb"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip4e296577d7ce1ea0af75a29549cd06bb'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip4e296577d7ce1ea0af75a29549cd06bb'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT5000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT5000&quot;],&quot;users&quot;:[5000]}">
													<span id="portal-buy-button-tooltip081cac8267b034f8cab4727bf07cdfee"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip081cac8267b034f8cab4727bf07cdfee'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip081cac8267b034f8cab4727bf07cdfee'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT6000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT6000&quot;],&quot;users&quot;:[6000]}">
													<span id="portal-buy-button-tooltip24d9fa318e688016ac2a7256a0f22f2e"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip24d9fa318e688016ac2a7256a0f22f2e'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip24d9fa318e688016ac2a7256a0f22f2e'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT7000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT7000&quot;],&quot;users&quot;:[7000]}">
													<span id="portal-buy-button-tooltipd35fedd9b6b8d9333c4fe8a0f0b2a1c6"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipd35fedd9b6b8d9333c4fe8a0f0b2a1c6'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipd35fedd9b6b8d9333c4fe8a0f0b2a1c6'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT8000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT8000&quot;],&quot;users&quot;:[8000]}">
													<span id="portal-buy-button-tooltipa75cf77be3d452483ee354c9a388a4af"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipa75cf77be3d452483ee354c9a388a4af'-->
														<a href="https://ltm.studio/" class="no-line"><span
																class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
																data-section-initialized="">купить</span></a>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipa75cf77be3d452483ee354c9a388a4af'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT9000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT9000&quot;],&quot;users&quot;:[9000]}">
													<span id="portal-buy-button-tooltipb2bf776d3e32988ce170386b1976bcee"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipb2bf776d3e32988ce170386b1976bcee'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipb2bf776d3e32988ce170386b1976bcee'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT10000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT10000&quot;],&quot;users&quot;:[10000]}">
													<span id="portal-buy-button-tooltipf020663a05bb441c129434777b192efe"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipf020663a05bb441c129434777b192efe'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipf020663a05bb441c129434777b192efe'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT&quot;,&quot;option&quot;:[&quot;3&quot;]}">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT250&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT250&quot;],&quot;users&quot;:[250]}"
													data-sb-selected="true"><span
														id="portal-buy-button-tooltipe04118a20d5d20524d851c222ea4f7c8"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipe04118a20d5d20524d851c222ea4f7c8'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipe04118a20d5d20524d851c222ea4f7c8'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT500&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT500&quot;],&quot;users&quot;:[500]}">
													<span id="portal-buy-button-tooltipc4aa6fd4cba673ce7a5b46ab01173ccd"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipc4aa6fd4cba673ce7a5b46ab01173ccd'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipc4aa6fd4cba673ce7a5b46ab01173ccd'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT1000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT1000&quot;],&quot;users&quot;:[1000]}">
													<span id="portal-buy-button-tooltip7ad1a4c98069e2971eab86d4bf55d95c"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip7ad1a4c98069e2971eab86d4bf55d95c'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip7ad1a4c98069e2971eab86d4bf55d95c'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT2000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT2000&quot;],&quot;users&quot;:[2000]}">
													<span id="portal-buy-button-tooltip7def58ca672be95a149850c3b07853cb"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip7def58ca672be95a149850c3b07853cb'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip7def58ca672be95a149850c3b07853cb'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT3000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT3000&quot;],&quot;users&quot;:[3000]}">
													<span id="portal-buy-button-tooltip290129d887f575c99de4fda597cd8674"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip290129d887f575c99de4fda597cd8674'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip290129d887f575c99de4fda597cd8674'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT4000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT4000&quot;],&quot;users&quot;:[4000]}">
													<span id="portal-buy-button-tooltipa55a9bdef3099845856adc7ca5e1bce3"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipa55a9bdef3099845856adc7ca5e1bce3'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipa55a9bdef3099845856adc7ca5e1bce3'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT5000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT5000&quot;],&quot;users&quot;:[5000]}">
													<span id="portal-buy-button-tooltip12e7cfddf5de66c0cafe325f64ef0a9e"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip12e7cfddf5de66c0cafe325f64ef0a9e'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip12e7cfddf5de66c0cafe325f64ef0a9e'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT6000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT6000&quot;],&quot;users&quot;:[6000]}">
													<span id="portal-buy-button-tooltip07afdbedfa36c928c514b268f5908e1c"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip07afdbedfa36c928c514b268f5908e1c'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip07afdbedfa36c928c514b268f5908e1c'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT7000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT7000&quot;],&quot;users&quot;:[7000]}">
													<span id="portal-buy-button-tooltip55ec06aa0002a77875ba96ccca42d990"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip55ec06aa0002a77875ba96ccca42d990'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip55ec06aa0002a77875ba96ccca42d990'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT8000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT8000&quot;],&quot;users&quot;:[8000]}">
													<span id="portal-buy-button-tooltip5b2ad838a5c067f8a710dda727ab23a7"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip5b2ad838a5c067f8a710dda727ab23a7'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip5b2ad838a5c067f8a710dda727ab23a7'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT9000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT9000&quot;],&quot;users&quot;:[9000]}">
													<span id="portal-buy-button-tooltipea1ba4e0e557fd6a808fdffa2c730393"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipea1ba4e0e557fd6a808fdffa2c730393'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipea1ba4e0e557fd6a808fdffa2c730393'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT10000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT10000&quot;],&quot;users&quot;:[10000]}">
													<span id="portal-buy-button-tooltipb08ab631ef8d44fa7cf539e96fd147bc"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipb08ab631ef8d44fa7cf539e96fd147bc'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipb08ab631ef8d44fa7cf539e96fd147bc'-->
													</span>
												</div>
											</div>
											<div class="bx-sb-b24-price-table-order__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT&quot;,&quot;option&quot;:[&quot;12&quot;]}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT250&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT250&quot;],&quot;users&quot;:[250]}"
													data-sb-selected="true"><span
														id="portal-buy-button-tooltip6b322febfaf54f7e13f096b0584d4db0"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip6b322febfaf54f7e13f096b0584d4db0'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip6b322febfaf54f7e13f096b0584d4db0'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT500&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT500&quot;],&quot;users&quot;:[500]}">
													<span id="portal-buy-button-tooltip610c7abc345e4247ebd84e43a0f291cd"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip610c7abc345e4247ebd84e43a0f291cd'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip610c7abc345e4247ebd84e43a0f291cd'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT1000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT1000&quot;],&quot;users&quot;:[1000]}">
													<span id="portal-buy-button-tooltip713490bc1e1daefeeda116531416ba89"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip713490bc1e1daefeeda116531416ba89'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip713490bc1e1daefeeda116531416ba89'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT2000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT2000&quot;],&quot;users&quot;:[2000]}">
													<span id="portal-buy-button-tooltipdd001b55c120e74a2fd33a91a48be641"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipdd001b55c120e74a2fd33a91a48be641'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipdd001b55c120e74a2fd33a91a48be641'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT3000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT3000&quot;],&quot;users&quot;:[3000]}">
													<span id="portal-buy-button-tooltip35f898bb3f9eac664ef8e61f7c80243d"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip35f898bb3f9eac664ef8e61f7c80243d'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip35f898bb3f9eac664ef8e61f7c80243d'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT4000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT4000&quot;],&quot;users&quot;:[4000]}">
													<span id="portal-buy-button-tooltipdafcc6526e483ab0ce6b1f138eb23c38"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipdafcc6526e483ab0ce6b1f138eb23c38'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipdafcc6526e483ab0ce6b1f138eb23c38'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT5000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT5000&quot;],&quot;users&quot;:[5000]}">
													<span id="portal-buy-button-tooltipf3497cc0d895a49dfe6c109fb26a303d"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipf3497cc0d895a49dfe6c109fb26a303d'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipf3497cc0d895a49dfe6c109fb26a303d'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT6000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT6000&quot;],&quot;users&quot;:[6000]}">
													<span id="portal-buy-button-tooltip486e01bcce73b49f3fedaea46f51229c"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip486e01bcce73b49f3fedaea46f51229c'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip486e01bcce73b49f3fedaea46f51229c'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT7000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT7000&quot;],&quot;users&quot;:[7000]}">
													<span id="portal-buy-button-tooltipbefe2aea864d026b4f52e3fbe8c72d1c"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltipbefe2aea864d026b4f52e3fbe8c72d1c'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltipbefe2aea864d026b4f52e3fbe8c72d1c'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT8000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT8000&quot;],&quot;users&quot;:[8000]}">
													<span id="portal-buy-button-tooltip4ea40c4cb36a66ea26cb26c8b6c90d11"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip4ea40c4cb36a66ea26cb26c8b6c90d11'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip4ea40c4cb36a66ea26cb26c8b6c90d11'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT9000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT9000&quot;],&quot;users&quot;:[9000]}">
													<span id="portal-buy-button-tooltip19f2dd3bb74e6a8db97d0a817908f396"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip19f2dd3bb74e6a8db97d0a817908f396'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip19f2dd3bb74e6a8db97d0a817908f396'-->
													</span>
												</div>
												<div class="bx-sb-b24-price-table-order__content"
													data-sb-order-section="{&quot;code&quot;:&quot;ENT10000&quot;}"
													data-sb-section-search="{&quot;code&quot;:[&quot;ENT10000&quot;],&quot;users&quot;:[10000]}">
													<span id="portal-buy-button-tooltip70f0dfb1f6600cfb48b524d70dde6413"
														class="portal-buy-button-tooltip">
														<!--'start_frame_cache_portal-buy-button-tooltip70f0dfb1f6600cfb48b524d70dde6413'-->
														<span
															class="js-portal-buy-window-bitrix bx-sb-b24-price-table-order__button"
															data-section-initialized="">купить</span>
														<div class="portal-buy-button-tooltip__window"></div>
														<!--'end_frame_cache_portal-buy-button-tooltip70f0dfb1f6600cfb48b524d70dde6413'-->
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__storage" data-sb-popup-click="STORAGE/ENT"
										data-sb-hover="true">
										<div class="bx-sb-b24-price-table-storage">
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT250&quot;,&quot;users&quot;:&quot;250&quot;}"
												data-sb-selected="true">
												<div class="bx-sb-b24-price-table-storage__value">3 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT500&quot;,&quot;users&quot;:&quot;500&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">5 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT1000&quot;,&quot;users&quot;:&quot;1000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">10 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT2000&quot;,&quot;users&quot;:&quot;2000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">20 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT3000&quot;,&quot;users&quot;:&quot;3000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">30 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT4000&quot;,&quot;users&quot;:&quot;4000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">40 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT5000&quot;,&quot;users&quot;:&quot;5000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">50 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT6000&quot;,&quot;users&quot;:&quot;6000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">60 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT7000&quot;,&quot;users&quot;:&quot;7000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">70 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT8000&quot;,&quot;users&quot;:&quot;8000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">80 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT9000&quot;,&quot;users&quot;:&quot;9000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">90 Тб</div>
											</div>
											<div class="bx-sb-b24-price-table-storage__content"
												data-sb-section-search="{&quot;code&quot;:&quot;ENT10000&quot;,&quot;users&quot;:&quot;10000&quot;}">
												<div class="bx-sb-b24-price-table-storage__value">100 Тб</div>
											</div>
										</div>
									</div>
									<div class="bx-sb-b24-price-table__supply">
										<div class="bx-sb-b24-price-table-supply" data-sb-runner-section="">
											<div class="bx-sb-b24-price-table-supply__inner">
												<div class="bx-sb-b24-price-table-supply__section">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="COLLABORATION/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0432\u043c\u0435\u0441\u0442\u043d\u0430\u044f \u0440\u0430\u0431\u043e\u0442\u0430&quot;}"
																	data-sb-title-initialized="true">Совместная
																	работа </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Совместная работа</div>
																</div>
															</div>
														</div>
														<div class="bx-sb-b24-price-table-supply__list">
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/ENT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0427\u0430\u0442&quot;}"
																		data-sb-title-initialized="true">
																		Чат </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Чат</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/ENT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0412\u0438\u0434\u0435\u043e\u0437\u0432\u043e\u043d\u043a\u0438 HD&quot;}"
																		data-sb-title-initialized="true">
																		Видеозвонки HD </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Видеозвонки HD</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/ENT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u0430\u043b\u0435\u043d\u0434\u0430\u0440\u044c&quot;}"
																		data-sb-title-initialized="true">
																		Календарь </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Календарь</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="HR/ENT" data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043e\u0446\u0441\u0435\u0442\u044c \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Соцсеть компании </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Соцсеть компании</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/ENT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u041d\u043e\u0432\u043e\u0441\u0442\u0438&quot;}"
																		data-sb-title-initialized="true">
																		Новости </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			Новости</div>
																	</div>
																</div>
															</div>
															<div class="bx-sb-b24-price-table-supply__content"
																data-sb-runner-marker="">
																<div class="bx-sb-b24-price-table-supply__container"
																	data-sb-popup-click="COLLABORATION/ENT"
																	data-sb-hover="true">
																	<div class="bx-sb-b24-price-table-supply__message"
																		data-sb-title-data="{&quot;message&quot;:&quot;\u0411\u0430\u0437\u0430 \u0437\u043d\u0430\u043d\u0438\u0439&quot;}"
																		data-sb-title-initialized="true">
																		База знаний </div>
																	<div
																		class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																		<div
																			class="bx-sb-b24-price-table-tooltip__content">
																			База знаний</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="TASKS_AND_PROJECTS/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0417\u0430\u0434\u0430\u0447\u0438 \u0438 \u041f\u0440\u043e\u0435\u043a\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Задачи и
																	Проекты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Задачи и Проекты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CRM/ENT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;CRM&quot;}"
																	data-sb-title-initialized="true">CRM </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		CRM</div>
																</div>
															</div>
															<!-- <a class="bx-sb-b24-price-table-supply__label bx-sb-b24-price-table-supply__label_icon bx-sb-b24-price-table-supply__label_crm"
																href="https://crm1.bitrix24.ru/" target="_blank"
																data-sb-side-panel="https://crm1.bitrix24.ru/">CRM
																№1</a> -->
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="STORAGE/ENT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u0438\u0441\u043a&quot;}"
																	data-sb-title-initialized="true">Диск </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Диск</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="CONTACT_CENTER/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442-\u0446\u0435\u043d\u0442\u0440&quot;}"
																	data-sb-title-initialized="true">Контакт-центр
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Контакт-центр</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="SITES_AND_LANDINGS/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u0430\u0439\u0442\u044b&quot;}"
																	data-sb-title-initialized="true">Сайты </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сайты</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_SHOP/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0418\u043d\u0442\u0435\u0440\u043d\u0435\u0442-\u043c\u0430\u0433\u0430\u0437\u0438\u043d&quot;}"
																	data-sb-title-initialized="true">
																	Интернет-магазин </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Интернет-магазин</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="MARKETING/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041c\u0430\u0440\u043a\u0435\u0442\u0438\u043d\u0433&quot;}"
																	data-sb-title-initialized="true">Маркетинг
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Маркетинг</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ONLINE_DOCUMENTS/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0414\u043e\u043a\u0443\u043c\u0435\u043d\u0442\u044b \u041e\u043d\u043b\u0430\u0439\u043d&quot;}"
																	data-sb-title-initialized="true">Документы
																	Онлайн </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Документы Онлайн</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ANALYTICS/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0421\u043a\u0432\u043e\u0437\u043d\u0430\u044f \u0430\u043d\u0430\u043b\u0438\u0442\u0438\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Сквозная
																	аналитика </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Сквозная аналитика</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="BUSINESS_AUTOMATION/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0410\u0432\u0442\u043e\u043c\u0430\u0442\u0438\u0437\u0430\u0446\u0438\u044f&quot;}"
																	data-sb-title-initialized="true">Автоматизация
																</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Автоматизация</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HR/ENT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;HR&quot;}"
																	data-sb-title-initialized="true">HR </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		HR</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="BRANCHES/ENT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0424\u0438\u043b\u0438\u0430\u043b\u044b&quot;}"
																	data-sb-title-initialized="true">Филиалы </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Филиалы</div>
																</div>
															</div>

														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ENTERPRISE_CLUSTER/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u042d\u043d\u0442\u0435\u0440\u043f\u0440\u0430\u0439\u0437-\u043a\u043b\u0430\u0441\u0442\u0435\u0440&quot;}"
																	data-sb-title-initialized="true">
																	Энтерпрайз-кластер </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Энтерпрайз-кластер</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ENTERPRISE_PACKAGE/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u042d\u043d\u0442\u0435\u0440\u043f\u0440\u0430\u0439\u0437-\u043f\u0430\u043a\u0435\u0442&quot;}"
																	data-sb-title-initialized="true">
																	Энтерпрайз-пакет </div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Энтерпрайз-пакет</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="bx-sb-b24-price-table-supply__section"
													data-sb-popup-click="BRANCHES/ENT" data-sb-hover="true">
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="HELPDESK/ENT" data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u041f\u043e\u0434\u0434\u0435\u0440\u0436\u043a\u0430&quot;}"
																	data-sb-title-initialized="true">Поддержка</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Поддержка</div>
																</div>
															</div>
														</div>
													</div>
													<div class="bx-sb-b24-price-table-supply__list">
														<div class="bx-sb-b24-price-table-supply__content"
															data-sb-runner-marker="">
															<div class="bx-sb-b24-price-table-supply__container"
																data-sb-popup-click="ADMINISTRATION/ENT"
																data-sb-hover="true">
																<div class="bx-sb-b24-price-table-supply__message bx-sb-b24-price-table-supply__message_icon bx-sb-b24-price-table-supply__message_icon-3"
																	data-sb-title-data="{&quot;message&quot;:&quot;\u0410\u0434\u043c\u0438\u043d\u0438\u0441\u0442\u0440\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435&quot;}"
																	data-sb-title-initialized="true">
																	Администрирование</div>
																<div
																	class="bx-sb-b24-price-table-tooltip bx-sb-b24-price-table-tooltip_title">
																	<div class="bx-sb-b24-price-table-tooltip__content">
																		Администрирование</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>




	<!-- Pages Switch Start -->
	<script>
		$(document).ready(function () {
			$('.box').click(function () {
				$('.main-page').addClass('dnone');
				$('#page_2').css("background", "white");
				$('#page_2').css("color", "black");
				$('#page_1').css("background", "rgb(4, 91, 160)");
				$('#page_1').css("color", "white");
			});
		});
		$(document).ready(function () {
			$('.sky').click(function () {
				$('.main-page').removeClass('dnone');
				$('#page_2').css("background", "rgb(4, 91, 160)");
				$('#page_2').css("color", "white");
				$('#page_1').css("background", "white");
				$('#page_1').css("color", "black");
			});
		});
		// Pages Switch End 



	</script>
	<script>

		// Enterprice Column Start
		const dropdownBtn4 = document.getElementById("btn4");
		const dropdownMenu4 = document.getElementById("dropdown4");
		const toggleArrow4 = document.getElementById("arrow4");
		// Toggle dropdown function
		const toggleDropdown4 = function () {
			dropdownMenu4.classList.toggle("show4");
			toggleArrow4.classList.toggle("arrow4");
		};
		// Toggle dropdown open/close when dropdown button is clicked
		dropdownBtn4.addEventListener("click", function (e) {
			dropdownBtn4.style.background = "white";
			dropdown4.style.background = "transparent";
			e.stopPropagation();
			toggleDropdown4();
		});
		// Close dropdown when dom element is clicked
		document.documentElement.addEventListener("click", function () {
			if (dropdownMenu4.classList.contains("show4")) {
				dropdownBtn4.style.background = "none";
				toggleDropdown4();
			}
		});
		function myValue2() {
			const content2 = document.getElementById("myOpt2").value;
			document.getElementById("demo4").innerHTML = content2;
			document.getElementById("enter").innerHTML = "9 070";
		}
		function myValue3() {
			const content3 = document.getElementById("myOpt3").value;
			document.getElementById("demo4").innerHTML = content3;
			document.getElementById("enter").innerHTML = "16 000";
		}

		// Enterprice Column End


		// Price change in Main-page
		function jsfunc1() {
			if (document.getElementById('selectid').value == "val1") {
				document.getElementById("percent").style.display = "none";
				document.getElementById("percent2").style.display = "none";
				document.getElementById("percent3").style.display = "none";
				document.getElementById("percent4").style.display = "none";
				document.getElementById("base").innerHTML = "830";
				document.getElementById("stand").innerHTML = "2 330";
				document.getElementById("pro").innerHTML = "4 670";
				document.getElementById("enter").innerHTML = "20 000";
			}
			else if (document.getElementById('selectid').value == "val2") {
				document.getElementById("percent").style.display = "none";
				document.getElementById("percent2").style.display = "none";
				document.getElementById("percent3").style.display = "none";
				document.getElementById("percent4").style.display = "none";
				document.getElementById("base").innerHTML = "830";
				document.getElementById("stand").innerHTML = "2 330";
				document.getElementById("pro").innerHTML = "4 670";
				document.getElementById("enter").innerHTML = "20 000";
			}
			else if (document.getElementById('selectid').value == "val3") {
				document.getElementById("percent").style.display = "block";
				document.getElementById("percent2").style.display = "block";
				document.getElementById("percent3").style.display = "block";
				document.getElementById("percent4").style.display = "block";
				document.getElementById("base").innerHTML = "665";
				document.getElementById("stand").innerHTML = "1 865";
				document.getElementById("pro").innerHTML = "3 730";
				document.getElementById("enter").innerHTML = "9 070";
			}
		}

		function selectTab(option) {
			// Убираем активный класс со всех табов
			document.getElementById('tab-month').classList.remove('active');
			document.getElementById('tab-year').classList.remove('active');

			if (option === 'month') {
				// Делаем активным таб "на месяц"
				document.getElementById('tab-month').classList.add('active');

				// Скрываем проценты скидки
				document.getElementById("percent").style.display = "none";
				document.getElementById("percent2").style.display = "none";
				document.getElementById("percent3").style.display = "none";
				document.getElementById("percent4").style.display = "none";

				// Устанавливаем цены для "на месяц"
				document.getElementById("base").innerHTML = "830";
				document.getElementById("stand").innerHTML = "2 330";
				document.getElementById("pro").innerHTML = "4 670";
				document.getElementById("enter").innerHTML = "20 000";

			} else if (option === 'year') {
				// Делаем активным таб "на год"
				document.getElementById('tab-year').classList.add('active');

				// Показываем проценты скидки
				document.getElementById("percent").style.display = "block";
				document.getElementById("percent2").style.display = "block";
				document.getElementById("percent3").style.display = "block";
				document.getElementById("percent4").style.display = "block";

				// Устанавливаем цены для "на год"
				document.getElementById("base").innerHTML = "665";
				document.getElementById("stand").innerHTML = "1 865";
				document.getElementById("pro").innerHTML = "3 730";
				document.getElementById("enter").innerHTML = "9 070";
			}
		}


	</script>