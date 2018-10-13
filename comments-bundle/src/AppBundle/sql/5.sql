-- sqls with sample data 
INSERT INTO users (name) VALUES ("John Smith");

INSERT INTO comments (content,creator_id,is_active,created,is_updated,updated,reply_to_id) VALUES ("Gastropub cardigan jean shorts, kogi Godard PBR&B lo-fi locavore. Organic chillwave vinyl Neutra. Bushwick Helvetica cred freegan, crucifix Godard craft beer deep v mixtape cornhole Truffaut master cleanse pour-over Odd Future beard. Portland polaroid iPhone.",(SELECT id FROM users WHERE users.name = "John Smith"),1,NOW(),0,NOW(),-1);

INSERT INTO users (name) VALUES ("Andrew Johnson");

INSERT INTO comments (content,creator_id,is_active,created,is_updated,updated,reply_to_id) VALUES ("That's exactly what I was thinking!",(SELECT id FROM users WHERE users.name = "Andrew Johnson"),1,NOW(),0,NOW(),1);
