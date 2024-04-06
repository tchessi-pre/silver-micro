const mongoose = require('mongoose');

const exampleSchema = new mongoose.Schema({
  name: {
    type: String,
    required: true
  },
  description: String
});

const Example = mongoose.model('Example', exampleSchema);

module.exports = Example;
