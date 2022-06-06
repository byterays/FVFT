import Api from './Api';

export default {
    getApplicants(page,filter){
        return Api().get('/company/web-api/getApplicants?page=' + page + '&filter=' + filter);
    },

    getDataSets(){
        return Api().get('/company/web-api/getDataSets');
    },

    createNewJob(formData){
        return Api().post('/web-api/job/create', formData);
    },

    updateBulkStatus(formData){
        return Api().post('/company/web-api/bulk-status-update', formData);
    },

    downloadBulkCv(formData){
        return Api().get('/company/web-api/bulk-cv-download', formData);
    }
}
