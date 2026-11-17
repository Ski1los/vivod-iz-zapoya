const ModalHandler = {
    open: (modalID) => {
        MenuHandler.close();
        BodyHandler.disableScroll();
        OverlayHandler.close();

        $(`.js-modal[data-modal-id="${modalID}"]`).addClass('modal_active');
    },
    close: (modalID) => {
        OverlayHandler.close();
        BodyHandler.enableScroll();

        $(`.js-modal[data-modal-id="${modalID}"]`).removeClass('modal_active');
        setTimeout(() => {
            $(`.js-modal[data-modal-id="${modalID}"]`).remove();
        }, 500);
    },
    closeAll: () => {
        OverlayHandler.close();
        BodyHandler.enableScroll();

        $(`.js-modal`).each(function() {
            $(this).removeClass('modal_active');
            setTimeout(() => {
                $(this).remove();
            }, 500);
        });
    },
    create: (data) => {
        data.action = 'ajax_get_modal';

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            method: 'GET',
            dataType: 'html',
            data: data,
            async: false,
            success: function(modal) {
                $('body').append(modal);

                BodyHandler.initPhoneMask();

                setTimeout(() => {
                    ModalHandler.open($(modal).attr('data-modal-id'));
                }, 100);
            },
        });
    },
};

$(document).ready(function() {
    $(document).on('click', '.js-create-modal', function() {
        ModalHandler.create($(this).data());
    });

    $(document).on('click', '.js-close-modal', function() {
        const modalID = $(this).attr('data-modal-id');

        ModalHandler.close(modalID);
    });

    $(document).on('click', '.js-modal', function(e) {
        if (e.target !== this) return;

        const modalID = $(this).attr('data-modal-id');
        ModalHandler.close(modalID);
    });
});