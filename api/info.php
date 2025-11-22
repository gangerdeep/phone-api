export default function handler(req, res) {
  const { num } = req.query;

  if (!num) {
    return res.status(400).json({ error: "Mobile number missing" });
  }

  // Original API call
  const apiUrl = `http://india.42web.io/number.php?q=${num}`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      res.status(200).json({
        status: "success",
        mobile: num,
        result: data
      });
    })
    .catch(err => {
      res.status(500).json({
        status: "error",
        message: "API not responding"
      });
    });
}
