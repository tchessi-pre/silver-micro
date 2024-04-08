const express = require('express');
const router = express.Router();
const Example = require('../models/Example');

// Route GET pour récupérer tous les exemples
router.get('/', async (req, res) => {
  try {
    const examples = await Example.find();
    res.json(examples);
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
});

// Route POST pour créer un nouvel exemple
router.post('/', async (req, res) => {
  const example = new Example({
    name: req.body.name,
    description: req.body.description
  });

  try {
    const newExample = await example.save();
    res.status(201).json(newExample);
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
});

module.exports = router;
