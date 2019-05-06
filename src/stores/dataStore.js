const dataStore = {
    // Modal
    modal:{
        content: null,
        active: false
    },
    // Ecard
    ecard:{
        uid: null,
        date: null,
        steps:{},
        status: {
            complete: false,
            recipients: null
        },
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
