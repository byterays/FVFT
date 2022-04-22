import Api from './Api';

export default {
    getData(page,meta){
        // return Api().get('/api/data/list?page=' + page + '&filter=' + meta.filter);
    },

    createNewJob(formData){
        return Api().post('/web-api/job/create', formData);
    },
}
