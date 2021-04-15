const App = {
  data() {
    return {
      students: [],

      idLast: 0,

      isDisabled: true,

      surnameInput: '',
      firstNameInput: '',
    };
  },
  methods: {
    addStudents(e) {
      e.preventDefault();
      this.idLast += 1;

      let firstNameModified =
          this.firstNameInput[0].toUpperCase() +
          this.firstNameInput.toLowerCase().slice(1),
        surnameModified =
          this.surnameInput[0].toUpperCase() +
          this.surnameInput.toLowerCase().slice(1);

      this.students.push({
        firstName: firstNameModified,
        surname: surnameModified,
        id: this.idLast,
      });

      this.clearForm();
    },

    validate() {
      if (this.firstNameInput && this.surnameInput) {
        this.isDisabled = false;
      } else {
        this.isDisabled = true;
      }
    },

    clearForm() {
      this.surnameInput = '';
      this.firstNameInput = '';
      this.isDisabled = true;
    },
  },
};

Vue.createApp(App).mount('#app');
