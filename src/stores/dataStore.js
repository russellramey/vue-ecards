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
            ecard_design: 'CNY2019-BANNER-1.jpg',
            ecard_color: ['#cccccc', '#c5c5c5'],
            ecard_greeting: 'Your greeting',
            ecard_message: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in egestas justo. Aliquam diam nibh, pharetra nec mattis eu, tempor at lacus. Vivamus ac lorem lacus. Mauris augue mi, feugiat in est eget, iaculis tempus nibh. Aliquam tristique, neque sed pellentesque fermentum, massa risus tincidunt ipsum, sed tempor magna sem at nisl.',
            ecard_from: {
                name: 'From Name',
                email: 'From Email'
            },
            ecard_to: [
                { name: 'To Name', email: 'To Email' }
            ]
        }
    }
}

// Export to app
export default dataStore
