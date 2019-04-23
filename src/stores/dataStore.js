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
            ecard_message: {
                greeting: null,
                comments: null,
                from: [
                    { name: null, email: null}
                ],
                to: [
                    { name: null, email: null }
                ]
            },
        }
    }
}

// Export to app
export default dataStore
