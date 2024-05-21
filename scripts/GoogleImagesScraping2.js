import unirest from "unirest";
import cheerio from "cheerio" 

const getImagesData = () => {
  const selectRandom = () => {
    const userAgents = [
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36",
      "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36",
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36",
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36",
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36",
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.71 Safari/537.36",
    ];
    const randomNumber = Math.floor(Math.random() * userAgents.length);
    return userAgents[randomNumber];
  };

  const user_agent = selectRandom();
  const header = {
    "User-Agent": `${user_agent}`,
  };

  return unirest
    .get(
      "https://www.google.com/search?q=nike&oq=nike&hl=en&tbm=isch&asearch=ichunk&async=_id:rg_s,_pms:s,_fmt:pc&sourceid=chrome&ie=UTF-8"
    )
    .headers(header)
    .then((response) => {
      const $ = cheerio.load(response.body);

      const images_results = [];
      $("div.rg_bx").each((i, el) => {
        const json_string = $(el).find(".rg_meta").text();
        images_results.push({
          title: $(el).find(".iKjWAf .mVDMnf").text(),
          source: $(el).find(".iKjWAf .FnqxG").text(),
          link: JSON.parse(json_string).ru,
          original: JSON.parse(json_string).ou,
          thumbnail: $(el).find(".rg_l img").attr("src") ? $(el).find(".rg_l img").attr("src") : $(el).find(".rg_l img").attr("data-src"),
        });
      });
      console.log(images_results);
    });
};

getImagesData(); 