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
            ecard_color: {},
            ecard_design: {},
            ecard_greeting: null,
            ecard_message: null,
            ecard_from: {
                name: null,
                email: null
            },
            ecard_to: [
                { name: null, email: null }
            ]
        }
    }
}

// Export to app
export default dataStore
