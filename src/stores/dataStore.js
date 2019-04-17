const dataStore = {
    // User info
    user: {
        name: 'default',
        email: 'default@sabre.com'
    },
    modal:{
        content: null,
        active: false
    },
    ecard:{
        steps:{},
        current_step: null,
        options: {
            ecard_design: null,
            ecard_from_email: null,
            ecard_from_name: null,
            ecard_message: null,
            ecard_to_email: [],
            ecard_to_name: []
        }
    }
}

// Export to app
export default dataStore
