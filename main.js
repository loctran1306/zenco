$(document).ready(function(){
    $('.sli_project').slick({
        // vertical:true,//Chay dọc
        slidesToShow: 2,    //Số item hiển thị
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:false,  //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:false, //Hiển thị mũi tên
        dots:false,  //Hiển thị dấu chấm
        responsive: [
            {
                breakpoint: 1030,
                settings: {
                    slidesToShow:3,
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow:2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 450,
                settings: {
                    slidesToShow:1,
                }
            }
        ]
    });


    $('.slick-thumb_produc').slick({
        infinite:false,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        autoplay:false,
        focusOnSelect: true,
        prevArrow: "<button type='button' class='slick-prev'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    });

    $('.slick-related-product').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        autoplay:true,
        focusOnSelect: true,
        prevArrow: "<button type='button' class='slick-prev'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1030,
                settings: {
                    slidesToShow:3,
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow:2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 350,
                settings: {
                    slidesToShow:2,
                }
            }
        ]

    });


    $('.slic-vds').slick({
        vertical:true,//Chay dọc
        slidesToShow: 2,    //Số item hiển thị
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:false , //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:false, //Hiển thị mũi tên
        dots:false,  //Hiển thị dấu chấm

    });
    $('.chaydoitac').slick({
        //vertical:true,//Chay dọc
        slidesToShow: 6,    //Số item hiển thị
        slidesToScroll: 1, //Số item cuộn khi chạy
        autoplay:false,  //Tự động chạy
        autoplaySpeed:3000,  //Tốc độ chạy
        speed:1000,//Tốc độ chuyển slider
        arrows:true, //Hiển thị mũi tên
        dots:false,  //Hiển thị dấu chấm
        responsive: [
            {
                breakpoint: 1030,
                settings: {
                    slidesToShow:4,
                    arrows:false,
                }
            },
            {
                breakpoint: 918,
                settings: {
                    slidesToShow:4,
                    arrows:false,
                }
            },
            {
                breakpoint: 725,
                settings: {
                    slidesToShow: 3,
                    arrows:false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow:2,
                    arrows:false,
                }
            }
        ]
    });

    
});

