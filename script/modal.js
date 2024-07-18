$(document).ready(function() {

    function ativaModalHubspot() {

        var modalDialog = $('<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"></div>');
        var modalContent = $('<div class="modal-content"></div>');
        var modalBody = $('<div class="modal-body" id="hubspotFormContainer"></div>');

        hbspt.forms.create({
            region: "na1",
            portalId: "44225969",
            formId: "81c21e13-3e2e-4036-a549-611535b34226",
            target: '#hubspotFormContainer'
        });

        modalContent.append(modalBody);
        modalDialog.append(modalContent);
        $('#hubspotModal').find('.modal-dialog').remove(); // Remove 
        $('#hubspotModal').append(modalDialog);

        
        $('#hubspotModal').modal('show');
    });
});